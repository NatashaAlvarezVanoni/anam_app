      <div id="landing-florero">
        <form name="flores" id="flores" action="https://jnietos.com/flores-app/florero" method="POST">
          <div id="buttons-top">
          <div id="button"><a href="#" onclick="mostrarDiv('rosas')"><img src="img/rosas.png"/></a></div>
          <!--<div id="button"><a href="#" onclick="mostrarDiv('azucenas')"><img src="img/azucenas.png"/></a></div>-->
          <div id="button"><a href="#" onclick="mostrarDiv('lirios')"><img src="img/lirios.png"/></a></div>
          <div id="button"><a href="#" onclick="mostrarDiv('girasoles')"><img src="img/girasoles.png"/></a></div>
          <div id="button"><a href="#" onclick="mostrarDiv('maceteros')"><img src="img/maceteros.png"/></a></div>
        </div>
        <div id="container-floreros">
          <div id="container-floreros-left">
            <div id="contenedor-imagen">
              <!--<img id="placeholder" src="">-->
            </div>
          </div>
          <div id="container-floreros-right">
            <?php
              $ruta = array('rosas','lirios','girasoles','maceteros');
                for ($j = 0; $j < count($ruta); ++$j) {
                  $directory = 'img/' . $ruta[$j] . '/' ;
                  //echo $directory;
                  $images = scandirSorted($directory);
                  $total_images = count($images); 
                  try {    
                    echo "<div id=\"" . $ruta[$j] . "\">";
                    for ($i = 0; $i < $total_images; $i++) {
                      $path = $directory . $images[$i];
                      echo "<div id='imagen'><img src=\"" . $path . "\"  />";
                      echo '<input type="checkbox" id="'.$ruta[$j].'-'.$i.'-chkbx" name="'.$ruta[$j].'" value="'.$images[$i].'" onclick="cambiarImg(\'' . $path . '\',\''.$ruta[$j].'-'.$i.'-chkbx\')"></div>';
                    }
                    echo "</div>";
                  }
                  catch(Exception $e) {
                  echo 'No images found for this player.<br />';
                  }
                }
                function getDirectoryList ($directory) 
                {
                  // create an array to hold directory list
                  $results = array();
                  // create a handler for the directory
                  $handler = opendir($directory);
                  // open directory and walk through the filenames
                  while ($file = readdir($handler)) {
                    // if file isn't this directory or its parent, add it to the results
                    if ($file != "." && $file != "..") {
                      $results[] = $file;
                    }
                  }
                  // tidy up: close the handler
                  closedir($handler);
                  // done!
                  return $results;
                }
                function scandirSorted($directory) {
                $sortedData = array();
                foreach(scandir($directory) as $file) {
                  if(is_file($directory . $file)) {
                    array_push($sortedData, $file);
                    $results[] = $file;
                  } else {
                    array_unshift($sortedData, $file);
                  }
                }
                  return $results;
                }
              ?>
              
          </div>
        </div>
        <div id="buttons-bottom">
          <div id="button">
            <input type="image" src="img/btn_sig.png"/>
            </div>
      </div>
      </form>
    </div>

