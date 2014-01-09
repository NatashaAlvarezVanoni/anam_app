      <?php //echo $me['id'];
        //foreach ($me as $key => $value) {
          //echo 'ARRAY FIELD - '. $key . ': ' . $value;
        //}
      ?>
      <div id="landing-detalle">
        <?php
          $uid = null;
          $nombre = null;
          $cedula = null;
          $email = null;
          $ciudad = null;
          $direccion = null;
          $telefono = null;
          $votos = null;
          foreach ($result as $row)
          {
            $uid = $row['id'];
            $fid_participante = $row['fid'];
            $nombre = $row['nombre'];
            $email = $row['email'];
            $cedula = $row['ci'];
            $ciudad = $row['ciudad'];
            $telefono = $row['telefono'];
            $direccion = $row['direccion'];
            $votos = $row['votos'];
          }
	?>
        <div id="detalle-florero">
              <div id="datos-aviso">
                <div id="informacion">
                  <h1>Florero de <?php echo $nombre;?></h1>
                </div>
              </div>
              <div id="foto-aviso" style="text-align:center;">
                      <?php
                      $imagen = "uploads/" . $fid_participante . "/florero-final.jpg";
                      echo '<img src="' . $imagen . '" width=250 height=250/><br/>';
                      ?>
              </div>
              <div id="datos-aviso-bottom">
                      <div id="informacion">
                      <h2><?php echo $nombre ?></h2>
                      <h2><?php echo $votos ?> Votos</h2>
                      </div>
                      <br>
                      <div id="botones">
                      <form name="votar-frm" method="GET" action="detalle">
                              <input type="hidden" name="action" value="inscrito"/>
                              <input type="hidden" name="id" value="<?php echo $uid; ?>"/>
                              <input type="hidden" name="fid_participante" value="<?php echo $fid_participante; ?>"/>
                              <input type="hidden" name="task" value="votar"/>
                              <input type="image" src="img/btn_votar.png"/>
                              <a href="galeria"><img src="img/btn_regresar.png"/></a>
                      </form>
                      
                      <div id="compartir">
                        Compartir:<br>

                      <?php
                          $protocol = 'https://';
                          $page_name = 'anamgrupo';
                          $app_id = '446610158788817';
                          $link = $protocol . 'www.facebook.com/'. $page_name .'?sk=app_' . $app_id;
                          $texto= "Vota por el florero de " . $nombre;
                      ?>
                        <a href="javascript:void();" onclick="sendfeed('juanxinho.webfactional.com/flores-app/<?php echo $imagen; ?>','<?php echo $nombre;?>')"><img border="0" src="img/facebook.png"/></a>
                        <a href="https://twitter.com/share?url=<?php echo $link ?>&text=<?php echo $texto ?>" data-lang="en" target="_blank"><img border="0" src="img/twitter.png"/></a>
                      </div>
                      </div>
                  <!--<div id="botones_sub"> 
                          <a href="<?php echo $out_link ?>"><img id="Volver" src="images/btn-vertodos.png" alt="Volver" border="0"/></a>
                  </div>	-->
            </div>
          </div>
        </div>
      </div>