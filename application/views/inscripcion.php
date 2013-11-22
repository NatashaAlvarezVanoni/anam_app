      <div id="landing-inscripcion">
        <?php echo validation_errors(); ?>
        <?php //echo $form_open;?>
        <form name="datos" id="datos" action="http://juanxinho.webfactional.com/flores-app-new/inscripcion" method="POST">
          <div id="form">
            <div id="texts"></div>
            <div id="fields">
              <div id="field"><?php echo $nombre;?></div>
              <div id="field"><?php echo $email;?></div>
              <div id="field"><?php echo $ci;?></div>
              <div id="field"><?php echo $ciudad;?></div>
              <div id="field"><?php echo $telefono;?></div>
              <div id="field"><?php echo $direccion;?></div>
            </div>
          </div>
          <div id="button-submit">
            <input type="image" src="img/btn_enviar.png" alt="Submit">
        </div>
        </form>
      </div>