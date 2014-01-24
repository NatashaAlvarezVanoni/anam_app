<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * --- Facebook Ignited ---
 *
 * fb_appid   is the app id you recieved from dev panel
 * fb_pageid  if the app has a Facebook Page this will make sure you can interact.
 * fb_secret  is the secret you recieved from dev panel
 * fb_canvas  the value you put in 'Canvas Page' field in dev panel or the address of your app.
 *            See example below the config.
 * fb_apptype set to either 'iframe' or 'connect' based on what platform your app is
 *            is running on.
 * fb_auth    is the default authentications, '' is basic authentication
 * fb_upload  tells the SDK whether or not file uploads are enabled on your server.
 */
$config['fb_appid']     = '446610158788817';
$config['fb_pageid']    = '464559146990910';
$config['fb_secret']    = 'bbbadb37442092163d6c24a59736e839';
$config['fb_canvas']    = 'anamfloresapp';
$config['fb_apptype']   = 'iframe';
$config['fb_auth']      = '';
$config['fb_upload']    = false;
$config['fb_logexcept'] = true;
//$config['fb_auth']      = 'publish_stream,email,offline_access';//'read_stream, friends_likes, user_photos, publish_actions';

/**
 * --- fb_canvas examples ---
 * iframe     your-facebook-namespace
 * connect    www.your-connect-domain.com/subfolder/
 */