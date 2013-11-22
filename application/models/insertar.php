<?php
class Insertar extends CI_Model{
    public function guardar() {
        $this->load->database();
        
        $fid = $_POST['ci'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $ci = $_POST['ci'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        //$foto = null;
        
        $this->db->query("INSERT INTO `inscripcion`(`fid`, `nombre`, `email`, `ci`, `ciudad`, `telefono`, `direccion`, `foto`)
                         VALUES('$fid','$nombre','$email','$ci','$ciudad','$telefono','$direccion',null)");

       //$this->db->set($data);
       //$this->db->insert('inscripcion');
       //$this->db->insert_id();
       }
} 
 ?>