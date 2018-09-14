=== My Sites Sort and Filter ===
Contributors: hendridm, trepmal, ericjuden
Tags: multisite, reorder, sort, filter, search, network
Donate link: https://paypal.me/danielhendricks
Requires at least: 4.8
Tested up to: 4.9.8
Requires PHP: 5.6
Stable tag: 1.0.0
License: GPL-2.0
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Sorts multisite dropdown site list alphabetically and adds a filter box.

== Description ==
This plugin helps you find sub-sites in the My Sites dropdown on large WordPress multisite installations. It sorts sites alphabetically and allows you to filter as you type.

This plugin was forked from code by [Kailey Lampert](https://github.com/trepmal/my-sites-search) and [Eric Juden](https://wordpress.org/plugins/reorder-my-sites/).

**Requirements**

* WordPress 4.8 or higher
* PHP 5.6 or higher
* WordPress Multisite

**Features**

* Sorts My Sites list alphabetically
* Adds a filter-as-you-type search input to the My Sites dropdown
* Supports multiple color scheme (including [Dark Mode](https://wordpress.org/plugins/dark-mode/))

GitHub repo: [https://github.com/cloudverve/my-sites-sort-filter](https://github.com/cloudverve/my-sites-sort-filter)

<img src="http://g.recordit.co/5ePi22skwG.gif" alt="Demonstration" />

== Installation ==
1. Install, activate, done.

Once activated, it automatically sorts sites and adds a filter search input (when list is greater than 10 in length). No configuration required.

== Frequently Asked Questions ==
**Can I change the number of sites that triggers the filter search input to appear?**

Yes, you can define the following constant in wp-config.php: `define( \'MSSF_MINIMUM_SITES\', 5 );` (replacing 5 with the number of your choice. I made it a PHP constant because I didn\'t think it was worth creating an entire settings page for.

== Screenshots ==
1. Sorted Site List with Filter Input

== Changelog ==
**2019/09/15**

* Initial release

== Upgrade Notice ==
Upgrades may be done automatically using the WordPress auto update mechanism.
