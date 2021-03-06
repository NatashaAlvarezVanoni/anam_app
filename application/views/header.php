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
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
    
    <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">-->
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
      
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
      function sendfeed(foto,mensaje)
      {
        FB.ui(
        {
          method: 'feed',
          name: 'ANAM - Arma tu florero',
          link: 'https://www.facebook.com/anamgrupo?sk=app_446610158788817',
          picture: foto,
          caption: 'Arma tu florero!',
          description: mensaje,
          message: 'Inscr�bete en arma tu florero y vota por tu favorito!'
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

      $(function() {
          var $tabs = $('#gallery-inscritos').tabs();
                                      
          $(".ui-tabs-panel").each(function(i){
                  var totalSize = $(".ui-tabs-panel").size() - 1;
                  if (i != totalSize) {
                          next = i + 2;
                          $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>>></a>");
                  }
                  if (i != 0) {
                          prev = i;
                          $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'><<</a>");
                          }
          });
          $('.next-tab, .prev-tab').click(function() {
                  $tabs.tabs('select', $(this).attr("rel"));
                  return false;
          });
          
          
          
        });
      
      function mostrarDiv(idDiv)
      {
        switch (idDiv)
        {
        case 'rosas':
          document.getElementById('rosas').style.display = "block";
          //document.getElementById('azucenas').style.display = "none";
          document.getElementById('lirios').style.display = "none";
          document.getElementById('girasoles').style.display = "none";
          document.getElementById('maceteros').style.display = "none";
          break;
        case 'azucenas':
          document.getElementById('rosas').style.display = "none";
          //document.getElementById('azucenas').style.display = "block";
          document.getElementById('lirios').style.display = "none";
          document.getElementById('girasoles').style.display = "none";
          document.getElementById('maceteros').style.display = "none";
          break;
        case 'lirios':
          document.getElementById('rosas').style.display = "none";
          //document.getElementById('azucenas').style.display = "none";
          document.getElementById('lirios').style.display = "block";
          document.getElementById('girasoles').style.display = "none";
          document.getElementById('maceteros').style.display = "none";
          break;
        case 'girasoles':
          document.getElementById('rosas').style.display = "none";
          //document.getElementById('azucenas').style.display = "none";
          document.getElementById('lirios').style.display = "none";
          document.getElementById('girasoles').style.display = "block";
          document.getElementById('maceteros').style.display = "none";
          break;
        case 'maceteros':
          document.getElementById('rosas').style.display = "none";
          //document.getElementById('azucenas').style.display = "none";
          document.getElementById('lirios').style.display = "none";
          document.getElementById('girasoles').style.display = "none";
          document.getElementById('maceteros').style.display = "block";
          break;
        }
        div = document.getElementById(idDiv);
        div.style.display= 'block';
      }
      function cambiarImg(path,id){
        var element = document.getElementById(id);
        if (element.checked == true){
          //alert ('checked');
          $('#contenedor-imagen').append('<img id="placeholder" class="'+id+'" src="'+path+'">');
        }else{
          $("."+id+"").remove();
          //alert ('not checked');
          //element.parentNode.removeChild(element);
        }
        
        //$("img#placeholder").attr("src", path);
      }
    </script>
  </head>
  <body>
    <div id="fb-root"></div>
    <div id="body-container">