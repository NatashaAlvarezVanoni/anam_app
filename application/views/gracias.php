      <div id="landing-gracias">
        <div id="compartir">
          Compartir:<br>
          <?php
              $protocol = 'https://';
              $page_name = 'anamgrupo';
              $app_id = '446610158788817';
              $link = $protocol . 'www.facebook.com/'. $page_name .'?sk=app_' . $app_id;
              $texto= "Arma tu florero personalizado";
          ?>
          <a href="javascript:void();" onclick="sendfeed('jnietos.com/<?php echo $imagen; ?>','<?php echo $nombre;?>')"><img border="0" src="img/facebook.png"/></a>
          <a href="https://twitter.com/share?url=<?php echo $link ?>&text=<?php echo $texto ?>" data-lang="en" target="_blank"><img border="0" src="img/twitter.png"/></a>
        </div>
      </div>
