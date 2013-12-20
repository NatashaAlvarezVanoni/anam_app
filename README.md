## Facebook Ignited v1.3.2 Documentation

Both of the projects merged into this project are open source projects.
I make no claim to their origin just the work put into expanding on them
and making their functionality more accessable.

You can view CodeIgniter at http://ellislab.com/codeigniter and Facebook PHP SDK at
https://github.com/facebook/facebook-php-sdk/ if you have any bugs regarding them please
check their coresponding sites.

As of this this version I am using CI v2.1.3 & FB SDK v3.2.2.

If you are looking for a full install you can download it from the ``full-install`` branch at:

``https://github.com/DarkProspectGames/Facebook-Ignited/tree/full-install``

Now a barebones version of Facebook Ignited is available in the ``not-ignited`` branch at:

``https://github.com/DarkProspectGames/Facebook-Ignited/tree/not-ignited``

Thanks! And I hope you enjoy this preconfigured version of Facebook Ignited!

Additional thanks to JetBrains for providing licensing for their software to contributors of this project. Their software is
completely amazing and definitely worth buying a personal license. Note: If you would like to use PhpStorm you must be a contributor
of Facebook Ignited. Licensing is for this project alone and any personal use of the software outside of this open source project is
prohibited as detailed by the license. If you are a contributor and have previously pushed contributions, you may qualify for use of
the software and will need to contact me at the admin@ email of darkprospect.net in order to request a copy of the license. Additionally
keep in mind this license is renewed yearly and if you do not qualify when it expires you will not get a renewed license with the rest
of the contributors.

Alfonso E Martinez III
Owner of Dark Prospect Games, LLC


#### Instructions for Installation

You will need a few things for this to work correctly:

1. This code
2. Hosting with PHP support
3. A facebook application

You can register your app at https://developers.facebook.com/apps

Once you have all those steps done, and you have set up your hosting and added that to your
app in the developers panel of Facebook. You will need to edit a few files in this code.

The following page you will need to change the variables to that found in your Dev Panel.

``application/config/fb_ignited.php``

or

``sparks/fb_ignited/config/fb_ignited.php``

One of the configurations you will need to pay close attention  to: ``$config['fb_apptype']`` If you set it to ``iframe`` only
use the info you put in the dev panel of your app. Eg. ``facebook-ignited`` in ``http://apps.facebook.com/facebook-ignited/``,
otherwise put the whole domain name excluding the ``http://`` or ``https://``.

After that you can load the example page and start to learn from there!

Once you have the system loaded for first time, please go and read:

https://github.com/DarkProspectGames/Facebook-Ignited/wiki/Methods

It will explain what the features do. Please note that I will only provide limited support to
people who have edited their ``application/libraries/Fb_ignited.php`` file without a pull request. As stated at
the top of the file it can cause disruption of application stability, please wait for me to either reply with a fix
or upload a new version. I am quick to respond and will make every effort to find a solution.

#### Instructions for Using Facebook Ignited

In order for you to get the system started on other files you will need to call:

```php
// Try to get the user details or catch the exception.
try {
    $this->fb_me = $this->fb_ignited->fb_get_me();
} catch (FBIgnitedException $e) {
    echo "There was an error trying to get your facebook details, try reloading page to try again.";
}
//  You can then check the status, if it hasn't already redirected.
if ($this->fb_me) {
    echo "Welcome back, {$this->fb_me['first_name']}!";
} else {
    echo "Welcome, Guest! Please login";
}
```

This will allow you to check if they are logged in, and if they are authenticated, if either one is not
true you can redirect them to the correct page so that they may do so by using ``->fb_get_me(true);``.
If the user has already authenticated ``$this->fb_me`` will hold all of the information from ``->api('/me')``
via the OpenGraph API.

If you want to use the additional formatting for generating login/logout links just use the following code:

```php
if ($this->fb_me) {
    $logout_url = $this->fb_ignited->fb_logout_url();
} else {
    $login_url = $this->fb_ignited->fb_login_url();
}
```

Facebook Ignited is a shell for Facebook PHP SDK, so any and all Facebook functions will be called automatically via the
``__call()`` "magic method" which allows you to do ``$this->fb_ignited->api()`` automatically (Instead of:
``$this->fb_ignited->facebook->api('/me')``) if it is not present in Facebook Ignited and is a native Facebook PHP SDK method.
This reduces the need for calling more than one class in your code.

#### Accepting Facebook Credits

As a added bonus the system now supports Facebook Credits, if you want use the system as it is create a database and
use this database query:

```sql
CREATE TABLE `fb_item_store` (
`item_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`title` VARCHAR( 50 ) NOT NULL ,
`price` INT NOT NULL ,
`description` VARCHAR( 100 ) NOT NULL ,
`image_url` VARCHAR( 100 ) NOT NULL ,
`product_url` VARCHAR( 100 ) NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE `fb_item_cache` (
`userid` BIGINT NOT NULL ,
`item_id` INT NOT NULL ,
`order_id` BIGINT NOT NULL ,
`finalized` INT NOT NULL,
`time` BIGINT NOT NULL,
KEY `userid` ( `userid` )
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;
```

Also ensure that you have the database info for that database added into the ``/config/database.php`` file and that
you auto-load the database class. This will allow the Facebook processing function to automatically add the items to
the `fb_item_cache` table so that users can grab them. You will need to make sure that you remove them from the
`fb_item_cache` table so that they do not get duplicates.


[![githalytics.com alpha](https://cruel-carlota.pagodabox.com/7f2a2b9a9fca4c6bf896b696a87506ca "githalytics.com")](http://githalytics.com/DarkProspectGames/Facebook-Ignited)
