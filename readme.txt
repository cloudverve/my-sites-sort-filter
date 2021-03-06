=== My Sites Sort and Filter ===
Contributors: hendridm, trepmal, ericjuden
Tags: multisite, reorder, sort, filter, search, network
Donate link: https://paypal.me/danielhendricks
Requires at least: 4.7
Tested up to: 5.0
Requires PHP: 5.4
Stable tag: 1.1.1
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Sorts multisite dropdown site list alphabetically and adds a filter-as-you-type search input.

== Description ==
This plugin helps you find sub-sites in the My Sites dropdown on large WordPress multisite installations. It sorts sites alphabetically and allows you to filter as you type.

This plugin was forked from code by [Kailey Lampert](https://github.com/trepmal/my-sites-search) and [Eric Juden](https://wordpress.org/plugins/reorder-my-sites/).

**Please** submit issues before giving a negative rating so I have the opportunity to fix them. Thank you.

GitHub repo: [https://github.com/cloudverve/my-sites-sort-filter](https://github.com/cloudverve/my-sites-sort-filter)

[youtube https://www.youtube.com/watch?v=bFwXUDvb3YA]

**Requirements**

* WordPress 4.7 or higher
* PHP 5.4 or higher
* WordPress Multisite

**Features**

* Sorts My Sites list alphabetically
* Adds a filter-as-you-type search input to the My Sites dropdown
* Supports multiple color schemes (including [Dark Mode](https://wordpress.org/plugins/dark-mode/))

**GDPR Safe**

This plugin _does not_ use or track _any user data_, either from visitors or users of WP Admin.

== Installation ==
1. Simply download, install and activate.

Once activated, it automatically sorts sites and adds a filter search input. No configuration needed.

== Frequently Asked Questions ==
**Can I change the number of sites that triggers the filter search input to appear?**

By default, the filter search field appears when there are greater than 10 sites in your My Sites list. To change this, you can define the following constant in wp-config.php (replace 5 with the number of your choice):

<code>define( 'MSSF_MINIMUM_SITES', 5 );</code>

== Screenshots ==
1. Sorted My Site List with Filter Input
2. Filter-as-you-type Example
3. Ectoplasm Theme
4. Example with Dark Mode

== Changelog ==

= 1.1.1 =
* Updated dependencies
* Bumped WordPress compatibility to 5.0

= 1.1.0 =
* Added Russian translations
* Added missing string translations for other languages
* Reduced minimum requirements to PHP 5.4 and WordPress 4.7

= 1.0.0 =
* Initial release

== Upgrade Notice ==
Upgrades may be done automatically using the WordPress auto update mechanism.
