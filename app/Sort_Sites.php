<?php
namespace CloudVerve\MySitesSortFilter;

class Sort_Sites extends Plugin {

  function __construct() {

    add_action( 'admin_bar_menu', array( &$this, 'reorder_subsite_list' ) );

  }

  /**
    * Sort site list alphabetically in dropdown. Forked from the following:
    *   https://wordpress.org/plugins/reorder-my-sites/
    *
    * @since 1.0.0
    */
  public function reorder_subsite_list() {

    global $wp_admin_bar;

    $current_network = get_network();
    $blog_names = array();
    $sites = $wp_admin_bar->user->blogs;

    foreach( $sites as $site_id=>$site ) {
      $blog_names[ $site_id ] = strtoupper( $site->blogname );
    }

    // Remove main blog from list to later add to the top
    if( isset( $blog_names[1] ) ) unset( $blog_names[1] );

    // Order by name
    asort( $blog_names );

    // Create new blog array
    $wp_admin_bar->user->blogs = array();

    // Add main blog back in to list
    $main_site = get_blog_details( $current_network->blog_id );
    if( $main_site ) {
      $wp_admin_bar->user->blogs[1] = (object) [
        'userblog_id' => $main_site->blog_id,
        'blogname' => $current_network->site_name,
        'domain' => $main_site->domain,
        'path' => $main_site->path,
        'site_id' => $current_network->site_id,
        'siteurl' => $main_site->siteurl
      ];
    }

    // Add others back in alphabetically
    foreach( $blog_names as $site_id=>$name ) {
      $wp_admin_bar->user->blogs[ $site_id ] = $sites[ $site_id ];
    }

  }

}
