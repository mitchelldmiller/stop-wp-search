=== Quick Mail ===
Contributors: brainiac
Tags: search, security
Donate link: https://mitchelldmiller.com/donate
Requires at least: 2.3
Tested up to: 6.2.2
Requires PHP: 5.3
Stable tag: 1.11
License: MIT
License URI: https://github.com/mitchelldmiller/stop-wp-search/blob/main/LICENSE

Stop users from searching your WordPress Website. Search requests are "not found."

== Description ==
> Tired of irrelevant search results on your WordPress site? Say goodbye to unwanted search requests with Stop WP Search!

Stop WP Search is the easiest way to stop search requests to your WordPress site.

WordPress search is not always helpful: especially for small sites.
Use Stop WP Search plugin to stop search requests.

_Formerly: Block WP Search_

== Features ==
* Search requests return "document not found."

= Learn More =
* [Follow development on Github](https://github.com/mitchelldmiller/stop-wp-search/).

== Installation ==
= Automated =
* Install [Git Updater](https://github.com/afragen/git-updater/releases/latest) plugin to install / update Stop WP Search from Github.

= Manual =
1. Download the plugin and unpack in your `/wp-content/plugins` directory.
2. Activate the plugin through the WordPress _Plugins_ menu.

= WP-CLI
* How to install and activate the latest version of Stop WP Search with [WP-CLI](https://wp-cli.org/) :

	`wp plugin install https://github.com/mitchelldmiller/stop-wp-search/archive/main.zip --activate`

== Configuration ==
* No options.

== Translators / Translations ==
* Nothing to translate.

== Frequently Asked Questions ==
* None.

= Privacy =
* Increases privacy. Stops random search requests.

== Changelog ==

= 1.00 =
* First public release.
* Tested with WordPress 6.0.0

= 1.02 =
* Check for empty server variables.

= 1.03 =
* Block WP Search is now Stop WP Search.

= 1.04 =
* Reply to search requests with status code 404.

= 1.10 =
* Fix soft 404 error on Google Webmaster Tools.

= 1.11 =
* Removed return type declaration to fix PHP 5 error.


== Upgrade Notice ==

= 1.00 =
* First public release.

= 1.02 =
* Upgrade recommended.

= 1.03 =
* Upgrade recommended.

= 1.04 =
* Upgrade recommended.

= 1.10 =
* Upgrade recommended.

= 1.11 =
* Upgrade recommended.

== License ==
Stop WP Search is free for personal or commercial use. Please support future development with a [donation](https://mitchelldmiller.com/donate).
