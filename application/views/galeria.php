      <div id="landing-galeria">
          <div id="gallery-inscritos">
            <?php
              $galeria = array();
              foreach ($result as $row)
              {
                $galeria[] = array(
                                    'id'=>$row['id'],
                                    'fid'=>$row['fid'],
                                    'nombre'=>$row['nombre'],
                                    'email'=>$row['email'],
                                    'ci'=>$row['ci'],
                                    'ciudad'=>$row['ciudad'],
                                    'telefono'=>$row['telefono'],
                                    'direccion'=>$row['direccion'],
                                    'votos'=>$row['votos'],
                                    );
              }
              $count = 1;
              $counttab = 1;
              //shuffle($galeria);
              ?>
              <ul>
                  <?php for($i=0;$i<sizeof($galeria)/6;$i++){ ?>
                  <li><a style="font-weight:bold;" href="#tabs-<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
                  <?php echo ($i+1 < sizeof($galeria)/6)?'<li style="margin-top: 8px;font-weight: bold;">-</li>':''; ?>
                  <?php } ?>
              </ul>	
              <?php
              for($i=0;$i<sizeof($galeria);$i++){
                  if($count==1){
                      echo '<div id="tabs-'. $counttab .'" class="tabsx"><ul class="gal-items">';
                  }
                  echo '<li>';
                  echo '<a href="tab_concurso.php?action=inscrito&id='.$galeria[$i]['id'].'">';
                  /*if (file_exists("uploads/".$galeria[$i]['uid']."/galeria_".$galeria[$i]['aviso'])){
                      echo '<img src="uploads/'.$galeria[$i]['uid'].'/galeria_'.$galeria[$i]['aviso'].'"/><br/>';
                  }else{
                      echo '<img src="images/galeria_nodisponible.jpg"/><br/>';
                  }*/
                  echo '<img src="uploads/' . $galeria[$i]['fid'] . '/florero-final.jpg" width="110" height="110"/><br/>';
                  echo '</a>';
                  echo '
                              <b><a href="detalle?action=inscrito&id='.$galeria[$i]['id'].'">'.$galeria[$i]['nombre'].'<br/>'.$galeria[$i]['votos'].' Votos</a></b>
                      </li>
                      ';
                  if($count==6){
                      $counttab++;
                      $count = 0;
                      echo '</ul></div>';
                  }
                  $count++;
              }
              if($count>0){
                  echo '</ul></div>';
                  $count=0;
              }
            ?>
          </div>
        <!--<div id="button-participar">-->
        <!--  <a href="instrucciones"><img src="img/boton_participar.png"/></a>-->
        <!--</div>-->
      </div>
