<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to Facebook Ignited</title>

		<style type="text/css">

			body {
				background-color: #fff;
				margin: 40px;
				font-family: Lucida Grande, Verdana, Sans-serif;
				font-size: 14px;
				color: #4F5155;
			}

			a {
				color: #003399;
				background-color: transparent;
				font-weight: normal;
			}

			h1 {
				color: #444;
				background-color: transparent;
				border-bottom: 1px solid #D0D0D0;
				font-size: 16px;
				font-weight: bold;
				margin: 24px 0 2px 0;
				padding: 5px 0 6px 0;
			}

			code {
				font-family: Monaco, Verdana, Sans-serif;
				font-size: 12px;
				background-color: #f9f9f9;
				border: 1px solid #D0D0D0;
				color: #002166;
				display: block;
				margin: 14px 0 14px 0;
				padding: 12px 10px 12px 10px;
			}

		</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="//connect.facebook.net/en_US/all.js"></script>
		<script>
			$(document).ready(function(){
				FB.init({ 
					appId  : '<?php echo $fb_app['fb_appid']; ?>',
					status : true, // check login status
					cookie : true, // enable cookies to allow the server to access the session
					xfbml  : true  // parse XFBML
				});
				FB.Canvas.setSize();
			});
			function sendfeed()
			{
				FB.ui(
				{
					method: 'feed',
					name: 'Facebook Ignited: The Open Source Facebook Framework',
					link: 'https://apps.facebook.com/facebook-ignited/',
					picture: '',
					caption: 'Check out this awesome free script!',
					description: '<?php if (isset($me)): echo $me['first_name'] . ","; endif; ?> just checked out Facebook Ignited! Be the first of their friends to do so!',
					message: 'Wow, this is awesome! And its Free!'
				},
				function(response) {
					if (response && response.post_id) {
						alert('Post was published.');
					} else {
						alert('Post was not published.');
					}
				}
			);
			}
			var request = {
				method: 'apprequests',
				message: 'Check out this free script!',
				data: ''
			};
			function sendRequest() {
				FB.ui(request, function (response) {
					if (response && response.request_ids) {
			             
						/* Do something after the user sends requests IE show a fancy graphic or record data in db */
			            
					} else {

						/* Do nothing or something whatever blows your hair back if they click cancel */
			       
					}
				})
			}
			function placeOrder() {
				var item_id = document.getElementById('item_id').value;

				// Assign an ID - usually points to a db record 
				// found in your callback
				var order_info = item_id;

				// calling the API ...
				var obj = {
					method: 'pay',
					order_info: order_info,
					purchase_type: 'item'
				};

				FB.ui(obj, callback);
			}
			    
			var callback = function(data) {
				if (data['order_id']) {
					// Success, we received the order_id. The order states can be
					// settled or cancelled at this point.
					return true;
				} else {
					//handle errors here
					return false;
				}
			};			
		</script>
	</head>
	<body>
		<div id="fb-root"></div>
	<fb:like show_faces="false" layout="button_count"></fb:like>
<?php if (isset($error)): echo $error; endif; ?>
	<h1>Welcome <?php if (isset($me)): echo $me['first_name'] . ","; else: echo "Guest"; endif; ?> to Facebook Ignited!</h1>

	<p>The page you are looking at is being generated dynamically by CodeIgniter &amp; the Facebook SDK.</p>

	<p>You can can view the advanced features by clicking <a href="<?= $login_login ?>">this link</a> to authorize the app!</p>

	<p>If you would like to edit this page you'll find it located at:</p>
	<code>application/views/welcome_message.php</code>

	<p>The corresponding controller for this page is found at:</p>
	<code>application/controllers/welcome.php</code>

	<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="/user_guide/">User Guide</a>.</p>

	<p>You can view the source code at: <a href="https://github.com/Necromnius/Facebook-Ignited/" target="_blank">https://github.com/Necromnius/Facebook-Ignited/</a></p>

	<p><a href='javascript:void();' onclick='sendRequest()'>Try a Request</a> | <a href='javascript:void();' onclick='sendfeed()'>Try Publishing to Your Feed</a></p>
	
	<h3>View up to five of your feed's posts:</h3>
	<p>
	<? foreach ($last_status['data'] as $value) { if ($value['type'] == 'status') { ?>
		<code><?=$value['message'];?></code>
	<?} elseif ($value['type'] == 'link' || $value['type'] == 'photo') {?>
		<code>You Liked a <?=ucwords($value['type'])?>:<br /><a href="<?=$value['link']?>" target="_blank"><?=$value['name']?></a></code>
	<?}}?>
	</p>
	<h3>Test out the process credit's method:</h3>
	<form name ="place_order" id="order_form" action="#">
		<img src="https://www.facebook.com/images/gifts/21.png" />
		<input type="hidden" name="item_id" value="1" id="item_id" />
		<img src="https://developers.facebook.com/attachment/credits_sm.png" height="25px" />
		<a onclick="placeOrder(); return false;">
			<img src="https://www.facebook.com/images/credits/paybutton.png" />
		</a>
	</form>
	<br />
	<p>Page rendered in {elapsed_time} seconds</p>

</body>
</html>