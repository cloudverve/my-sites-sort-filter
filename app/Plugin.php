<?php
namespace CloudVerve\MySitesSortFilter;

class Plugin {

  public static $config;

  function __construct( $abspath = null, $plugin_identifier = null ) {

    // Exit if cron or AJAX is running
    if( $this->is_ajax() || $this->doing_cron() ) return;

    // Load plugin header data and other variables
    self::$config = $this->load_plugin_data( $abspath, $plugin_identifier );

    // Define version constant
    if ( !defined( __NAMESPACE__ . '\VERSION' ) ) define( __NAMESPACE__ . '\VERSION', self::$config['Version'] );

    // Load text domain
    load_plugin_textdomain( self::$config['TextDomain'], false, self::$config['slug'] . '/languages' );

    // Check requirements
    register_activation_hook( self::$config['identifier'], array( $this, 'activate' ) );

    // Add plugin row meta
    add_filter( 'plugin_row_meta', array( $this, 'add_plugin_row_meta' ), 10, 2 );

    // Load plugin logic
    add_action( 'after_setup_theme', array( $this, 'load_plugin' ));

  }

  public function load_plugin() {

    // Sort site list
    new Sort_Sites();

    // Add site filter search input
    new Filter_Sites();

  }

  /**
    * Check plugin dependencies
    * @since 1.0.0
    */
  public function activate() {

    $requirements = new \underDEV_Requirements( __( 'My Sites Sort and Filter', self::$config['TextDomain'] ), [
      'php'       => '5.6',
      'wp'        => '4.8',
      'multisite' => true
    ]);

    $requirements->add_check( 'multisite', function( $val, $res ) {
      if( is_multisite() != $val ) $res->add_error( __( 'This plugin requires WordPress multisite/network mode.', self::$config['TextDomain'] ) );
    });

    $check_result = $requirements->satisfied();
    if ( !$check_result ) die( $requirements->notice() );

  }

  /**
    * Load plugin header data and set other values
    * @return bool
    * @since 1.0.0
    */
  private function load_plugin_data( $abspath, $identifier ) {

    $plugin_identifier = explode( DIRECTORY_SEPARATOR, $identifier );
    $plugin_data = [
      'identifier' => $identifier,
      'slug' => $plugin_identifier[0],
      'plugin_file' => $plugin_identifier[1],
      'plugin_path' => $abspath,
      'prefix' => 'mssf',
      'minumum_sites' => 10
    ];

    $plugin_data = array_merge( $plugin_data, get_plugin_data( $abspath . DIRECTORY_SEPARATOR . $plugin_data['plugin_file'], false ) );

    $plugin_data['translated_strings'] = [
      __( 'Sorts multisite dropdown site list alphabetically and adds a filter box.', $plugin_data['TextDomain'] )
    ];

    return $plugin_data;

  }

  /**
    * Check if AJAX is being performed
    *
    * @param string $links Current links markup
    * @param string $file Plugin filename
    * @since 1.0.0
    */
  function add_plugin_row_meta( $links, $identifier ) {
    if ( $identifier == self::$config['identifier'] ) {
      $row_meta = [
        'contributors' => esc_html__( 'Contributors', self::$config['TextDomain'] ) . ': <a href="' . esc_url( 'https://github.com/trepmal/my-sites-search' ) . '" target="_blank" aria-label="Kailey Lampert">Kailey Lampert</a>, <a href="' . esc_url( 'https://wordpress.org/plugins/reorder-my-sites/' ) . '" target="_blank" aria-label="Eric Juden">Eric Juden</a>'
      ];

      return array_merge( $links, $row_meta );
    }
    return (array) $links;
  }

  /**
    * Check if AJAX is being performed
    *
    * @return bool
    * @since 1.0.0
    */
  public function is_ajax() {
    return defined( 'DOING_AJAX' ) && DOING_AJAX;
  }

  /**
    * Check if cron is running
    *
    * @return bool
    * @since 1.0.0
    */
  public function doing_cron() {
    return defined( 'DOING_CRON' ) && DOING_CRON;
  }

}
