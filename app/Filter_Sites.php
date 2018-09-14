<?php
namespace CloudVerve\MySitesSortFilter;

class Filter_Sites extends Plugin {

  private $admin_color;

  function __construct() {

    // Add filter search input field
    add_action( 'admin_bar_menu', array( $this, 'add_search_bar' ) );

    // Inline style
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_filter_styles' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_filter_styles' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_filter_scripts' ) );
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_filter_scripts' ) );

  }

  /**
   * Add filter search input to sites dropdown. Forked from the following:
   *    https://github.com/trepmal/my-sites-search
   *
   * @param WP_Admin_Bar $wp_admin_bar
   * @return void
   * @since 1.0.0
   */
  public function add_search_bar( $wp_admin_bar ) {

    $total_users_sites = count( $wp_admin_bar->user->blogs );
  	$minimum_sites = defined( 'MSSF_MINIMUM_SITES' ) && is_int( MSSF_MINIMUM_SITES ) ? MSSF_MINIMUM_SITES : parent::$config['minumum_sites'];

  	if ( $total_users_sites < $minimum_sites ) return;

  	$wp_admin_bar->add_menu([
      'parent'  => 'my-sites-list',
      'id'      => 'my-sites-search',
      'title'   => sprintf( '<label for="my-sites-search-text">%s</label><input type="search" id="my-sites-search-text" placeholder="%s" />',  esc_html__( 'Search My Sites', parent::$config['TextDomain'] ), esc_attr__( 'Filter Sites', parent::$config['TextDomain'] ) ),
      'meta'    => [ 'class' => 'hide-if-no-js' ]
  	]);

  }

  /**
   * Inject inline styles
   *
   * @return void
   * @since 1.0.0
   */
  public function enqueue_filter_styles() {

    $colors = $this->get_colors_by_scheme();

    $style = "#wp-admin-bar-my-sites-search { height: 2.2em; }
      #wp-admin-bar-my-sites-search.hide-if-no-js { display: none; }
      #wp-admin-bar-my-sites-search label[for=\"my-sites-search-text\"] { clip: rect(1px, 1px, 1px, 1px); position: absolute !important; height: 1px; width: 1px; overflow: hidden; }
      #wp-admin-bar-my-sites-search .ab-item { height: 34px; }
      #wp-admin-bar-my-sites-search input { background-color: transparent; border: 1px solid {$colors['border']}; color: {$colors['text']}; padding: 2px 5px; width: 95%; width: calc( 100% - 14px); height: 1.7em; }
      #wp-admin-bar-my-sites-search input::-webkit-input-placeholder { color: {$colors['placeholder']}; }
      #wp-admin-bar-my-sites-search input::-moz-placeholder { color: {$colors['placeholder']}; }
      #wp-admin-bar-my-sites-search input:-ms-input-placeholder { color: {$colors['placeholder']}; }
      #wp-admin-bar-my-sites-search input::placeholder { color: {$colors['placeholder']}; }";

      wp_enqueue_style( 'admin-bar' );
      wp_add_inline_style( 'admin-bar', $style );

  }

  /**
   * Inject inline JavaScript
   *
   * @return void
   * @since 1.0.0
   */
  public function enqueue_filter_scripts() {

    $script = "jQuery(document).ready( function($) {
      $( '#wp-admin-bar-my-sites-search.hide-if-no-js' ).show();
      $( '#wp-admin-bar-my-sites-search input' ).on( 'input', function( ) {
        var searchValRegex = new RegExp( $(this).val(), 'i');
        $( '#wp-admin-bar-my-sites-list > li.menupop' ).hide().filter( function() {
          return searchValRegex.test( $(this).find( '> a' ).text() );
        }).show();
    	});
    });";

    wp_enqueue_script( 'jquery-core' );
    wp_add_inline_script( 'jquery-core', $script );

  }

  /**
   * Get colors by scheme
   *
   * @return array RGBA CSS color values
   * @since 1.0.0
   */
  public function get_colors_by_scheme() {

    switch( get_user_option( 'admin_color' ) ) {
      case 'light':
        return [ 'text' => 'rgba(51,51,51,0.7)', 'border' => 'rgba(51,51,51,0.6)', 'placeholder' => 'rgba(51,51,51,0.5)' ];
      case 'blue':
        return [ 'text' => 'rgba(226,236,241,1)', 'border' => 'rgba(226,236,241,0.9)', 'placeholder' => 'rgba(226,236,241,0.8)' ];
      case 'sunrise':
        return [ 'text' => 'rgba(252,215,214,0.8)', 'border' => 'rgba(252,215,214,0.7)', 'placeholder' => 'rgba(252,215,214,0.6)' ];
      case 'ectoplasm':
        return [ 'text' => 'rgba(211,205,218,0.8)', 'border' => 'rgba(211,205,218,0.7)', 'placeholder' => 'rgba(211,205,218,0.6)' ];
      case 'ocean':
        return [ 'text' => 'rgba(213,221,224,1)', 'border' => 'rgba(213,221,224,0.9)', 'placeholder' => 'rgba(213,221,224,0.8)' ];
      case 'coffee':
        return [ 'text' => 'rgba(219,217,216,0.8)', 'border' => 'rgba(219,217,216,0.7)', 'placeholder' => 'rgba(219,217,216,0.6)' ];
      case 'fresh':
      case 'midnight':
      default:
        return [ 'text' => 'rgba(255,255,255,0.7)', 'border' => 'rgba(255,255,255,0.6)', 'placeholder' => 'rgba(255,255,255,0.4)' ];
    }

  }

}
