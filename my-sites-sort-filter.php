<?php
/**
 * @wordpress-plugin
 * Plugin Name:       My Sites Sort and Filter
 * Plugin URI:        https://github.com/cloudverve/my-sites-sort-filter/
 * Description:       Sorts multisite dropdown site list alphabetically and adds a filter box.
 * Version:           1.0.0
 * Author:            Daniel M. Hendricks
 * Requires at least: 4.8
 * Requires PHP:      5.6
 * Tested up to:      4.9.8
 * Stable tag:        1.0.0
 * Author URI:        https://www.danhendricks.com/
 * Text Domain:       my-sites-sort-filter
 * Domain Path:       /languages
 */

 /*	Copyright 2018	  Daniel M. Hendricks (https://www.danhendricks.com/)

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

if( !defined('ABSPATH') ) die();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require( __DIR__ . '/vendor/autoload.php' );

// Initialize plugin
new \CloudVerve\MySitesSortFilter\Plugin( __DIR__, plugin_basename( __FILE__ ) );
