      <div id="landing-inscripcion">
        <?php //echo validation_errors(); ?>
        <?php //echo $form_open;?>
        <form name="datos" id="datos" action="https://juanxinho.webfactional.com/flores-app-new/inscripcion" method="POST">
          <div id="form">
            <div id="texts"></div>
            <div id="fields">
              <div id="field">
                <?php echo $nombre;?>
                <?php echo form_error('nombre'); ?>
              </div>
              <div id="field">
                <?php echo $email;?>
                <?php echo form_error('email'); ?>
              </div>
              <div id="field">
                <?php echo $ci;?>
                <?php echo form_error('ci'); ?>
              </div>
              <div id="field">
                <?php echo $ciudad;?>
                <?php echo form_error('ciudad'); ?>
              </div>
              <div id="field">
                <?php echo $telefono;?>
                <?php echo form_error('telefono'); ?>
              </div>
              <div id="field">
                <?php echo $direccion;?>
                <?php echo form_error('direccion'); ?>
              </div>
            </div>
          </div>
          <div id="button-submit">
            <input type="image" src="img/btn_enviar.png" alt="Submit">
        </div>
        </form>
      </div>