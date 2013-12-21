<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/styles.css" rel="stylesheet">
    <!--<script src="https://code.jquery.com/jquery.js"></script>-->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <!--<script src="js/facebook.js"></script>-->
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
          name: 'ANAM - Arma tu florero',
          link: 'https://www.facebook.com/anamgrupo?sk=app_446610158788817',
          picture: '',
          caption: 'Arma tu florero!',
          description: 'Inscr&iacute;bete en el app de ANAM para crear tu florero!',
          message: 'Inscr’bete en el app de ANAM para crear tu florero!'
        },
        function(response) {
                if (response && response.post_id) {
                        //alert('Post was published.');
                } else {
                        //alert('Post was not published.');
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
    <div id="body-container">