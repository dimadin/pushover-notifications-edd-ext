=== Pushover Notifications for Easy Digital Downloads ===
Contributors: cklosows
Tags: Easy Digital Downloads, Pushover
Requires at least: 3.0
Tested up to: 3.8.1
Stable tag: 1.3
Donate link: https://wp-push.com
License: GPLv2 or later

Add Push Notificaitons for sales to iPhone and Android Devices

== Description ==

Pushover Notifications for Easy Digital Downloads is an extension that allows you to receive push notifications of sales and daily earnings on your iOS and Android devices.

This extension also includes options to alert you when discount codes are nearing expiration and/or max usage.

Pushover is a third-party service that can send notifications to your iOS and Android devices. This add-on integrates with the Pushover service to send you notifications any time a new sale is made through Easy Digital Downloads. It will tell you the item(s) that was sold and the amount of the purchase. It can also send daily alerts with a breakdown of sales and earnings for the day.

== Changelog ==
= 1.3 =
* NEW: Intregation with Software Licensing Extension to identify items when renewed
* TWEAK: Improved translation integrations

= 1.2.9 =
* FIX: XSS vulnerability in query args

= 1.2.8 =
* NEW/FIX: Making the call to get users more efficient

= 1.2.7 =
* NEW: Added support for the new EDD 1.7 license handler.
* FIX: Fixed a bug with Total Sale Amount being shown as 0.00

= 1.2.6 =
* FIX: 1.2.6 is a minor update fixing the activation of the license key to only fire when the license tab is saved.

= 1.2.5 =
* NEW: Adding compatibility for Multiple Application Key option in Pushover Notifications for WordPress core plugin.
* FIX: Spelling error on Out of Date Core notice

= 1.2.4 =
* NEW: Notifications of sales and discount codes goes to users with the view_shop_reports capability, and the Administrator Pushover Key. The list of user ID’s can be augmented with the ckpn_sales_alert_capability (The capability needed to get alerts) and ckpn_users_to_alert_keys (List of Pushover User keys that were found) filters
* FIX: Admin Notices now use add_settings_error instead of sprintf
* FIX: Checkboxes converted to use the ‘checked’ function instead of if statements

= 1.2.3 =
* NEW: Sends Pushover Notifications to Commission Users if they have a key in their profile

= 1.2.2 =
* NEW: Prep work for 1.7.4 core plugin
* FIX: Fixed some spelling errors
* NEW: Added checks for core plugin
* FIX: Moved License Key into own setting (instead of within pushover settings)

= 1.2.1 =
* FIX: Fixing bug in 1.2 where core plugin class is not accessible during a core plugin update

= 1.2 =
* NEW: Option for sales notification to be cashregister sound
* NEW: Allowing discount code specific notifications
* FIX: Fixing an issue with cron scheduling.

= 1.1 =
* NEW: Discount Code notifications – You can now get notifications when discount codes reach %’s of their max usage or are nearing the 14, 7, and 1 day mark of their expiration. Future versions will allow you to do this for individual discount codes, instead of just all codes with max usages or expiration dates.
* FIX: Moved from procedural coding style to a OOP method.
* NEW: Add this changelog.txt file so I can include the changes made.
* FIX: Fixed a few spelling errors in the admin.
* FIX: PO/MO Files updated.
* NEW: Added a core version check with a minimum version of 1.7 for the Pushover Notifications plugin

= 1.0.3 =
* FIX: Fixed a bug with sending sales notifications.
* FIX: Fixed a bug with the license key activator that caused it to try and activate the license key with every page load.

= 1.0.2 =
* FIX: Fixing a bug related to identifying if the license is currently active.
* FIX: Fixing a bug related to i18n loading the plugin text domain.

= 1.1 =
* FIX: Fixed a bug that caused some notices to not get sent.

= 1.0 =
* NEW: Initial release.
