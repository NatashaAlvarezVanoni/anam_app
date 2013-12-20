## Change Log

#### v1.3.2
* Rewrote the commenting of Facebook Ignited to match PHPDoc Standards
* Removed fb_post_to_feed_dialog, fb_request_dialog() and fb_send_dialog() in order to seperate the SDKs
* Coding Standards for Facebook Ignited now require 4 spaces and absolutely no tabs.
* Added the .idea folder for users to use with IntelliJ Idea products by JetBrains like PhpStorm.
* JetBrains has offered licensing to all contributers of the Facebook Ignited project.
* Added a new configuration option 'fb_pageid' for the devs to add the id of the Facebook Fanpage of their applications.

#### v1.3.1
* Making Facebook PHP SDK directly accessible by the Facebook Ignited class, will help performance slightly.
* Moved the Facebook Enhanced project into Facebook Ignited as a branch called 'not-ignited'.
* Moved the Facebook Ignited project to DarkProspectGames group/team and updated the links in the README.
* Resolved issue #15 by removing json_decode() from fb_list_friends().
* Resolved issue #16 by changing the check for feed id from numeric to a pattern check of numeric plus underscore.

#### v1.3.0
* Updated the Facebook PHP SDK to v3.2.2
* Added a new FBIgnitedException class to handle the exceptions thrown from FacebookApiException class.
* Facebook Ignited now throws exceptions when there is an error from itself or from Facebook class.
* Added a new config 'fb_logexcept' which determines if FBIgnitedException class will send logs to PHP error_log().
* fb_fql() no longer has 'multiquery' parameter, it handles multiple or single queries depending on value you pass it.
* Resolved some issues where notices were being thrown from one of the functions due to a missing index on an array.
* Reolved issue #14 by making sure that the script tag is sent to fb_login_url().
* Corrected a few layout and description issues in change log.

#### v1.2.2
* Updated the Facebook PHP SDK to v3.2.1
* Fixed an issue where the fb_check_permissions() method was always returning true, thanks to clearright via forums.
* Fixed an issue where the fb_create_event() was not using the correct array to handle events.
* fb_login_url() and fb_check_permissions() methods now use arrays to receive parameters so that we can expand their functionality.
   Check the method docs on GitHub wiki for more information regarding these changes.

#### v1.2.1
* Merged Pull Request #11 by dcostalis: Fixed the autoloader config file for Spark.
* Merged Pull Request #12 by dcostalis: Added a conditional to the translating query strings to $_REQUEST[] if existent only.

#### v1.2.0
* Branched the full install over into it's own branch and formatted master for sparks generation.

#### v1.1.2
* Adding more defined visibility to all methods, preventing users from accessing the $this->globals variable.
* Adding support for file uploads via Facebook Ignited in the fb_config.php
* Added a new method fb_notification() to handle Facebook notifications.
* Added a fix for the constant redirect issue for some users not enabling query strings.

#### v1.1.1
* Updated the Facebook PHP SDK to v3.2.0
* Updated the CodeIgniter Framework to v2.1.3
* Added the script redirect to fb_logout_url() method.
* Clarified the fb_request_dialog() by change the parameter $name to $message.
* Cleaned up code on several methods, allowing for code to be read easier.

#### v1.1.0
* Added fb_post_to_feed_dialog(), fb_send_dialog(), fb_request_dialog() and fb_fql() courtesy of Kimmik from CI Forums.
* Resolved issues #4 & #6 regarding the demo login link being wrong. The variable was not encased in <?= ?>
* Updated fb_is_liked() function to correctly pull the like status.

#### v1.0.9
* Updated the CodeIgniter Framework to v2.1.2

#### v1.0.8
* Updated the CodeIgniter Framework to v2.1.1
* Fixed Git Issue #2 Autoload not correct
* Removed the register form function because we can already use json_encode to do the same thing.
* Added the custom redirect parameter to fb_login_url()

#### v1.0.7
* Updated the CodeIgniter Framework to v2.1.0

#### v1.0.6
* Updated the Facebook PHP SDK to v3.1.1
* Updated the CodeIgniter Framework to v2.0.3
* Added the ability to specify the global variable returned in from fb_get_app().
* Added the choice of full facebook friends list or just friends who have app installed to fb_list_friends().
* Added the ability to choose whether a user is redirected to the login page. Default is false.
* Removed the fb_get_auth_scope() & fb_get_canvas() functions, due to being able to retrieve global vars from fb_get_app().

#### v1.0.5
* Added extending permissions ability to fb_check_permission() function.
* Added fb_create_event() function which allows you to create an event.
* Added the ability to define scope in fb_login_url().
* Added the support for Facebook Connect to Library while creating a config setting that decides what type to use.
* Added Facebook register plugin support in fb_register_form() function to the Library, parses raw JSON or Array (
  converts to JSON) and returns an iframe which the system then pulls up the form in. As well as JSON support, the
  fb_register_form() function can also take html attributes to modify the look of iframe.
* Added fb_feed() function which allows for a non JavaScript method of publishing to a feed as well as deleting posts.

#### v1.0.4
* Updated the Facebook PHP SDK to v3.0.1
* Minor fixes in code to make sure compatability with servers that do not support PHP Short Tags.
* Added PHP redirect support for the fb_get_me() function, added to the javascript redirect support already present.
* Added fb_is_bookmarked() function which returns a boolean value regarding if app is bookmarked.
* Added fb_check_permissions($permission) function which will check if that the permission you are looking for is
  already authorized.
* Added fb_is_liked() function which will return a boolean value regarding whether a person has like your app's page.
* Added fb_list_friends() function which will return an array of values for which of your friends also installed app.
* Added fb_process_credits() function which will allow ability to process Facebook Credits.

#### v1.0.3
* Updated the Facebook PHP SDK to v3.0.0
* Consolidated the fb_get_me() & fb_get_session() functions into fb_get_me()

#### v1.0.2
* Support for both HTTP & HTTPS added
* Organized and edited core system to run better, especially when coming to configs. Added in minor security checks to check your configs for errors
* Shortened the require value in config for 'fb_canvas' to the value you placed in 'Canvas Page' box in dev panel
* Removed type calling when using acceptance of friend requests, will only use model