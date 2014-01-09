<?php
class Insertar extends CI_Model{
    public function guardar($fid) {
        $this->load->database();
        
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
    public function getGallery() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM `inscripcion`");
        $result = $query->result_array();
        return $result;
    }
    public function getUser($fid) {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM `inscripcion` WHERE fid=".$fid);
        $result = $query->result_array();
        return $result;
    }
    public function votar($id,$fid) {
        $this->load->database();
        $query = $this->db->query("SELECT COUNT(*) FROM `votos` WHERE participante_id=".$id. " and fid='".$fid."'");
        //echo "SELECT COUNT(*) FROM `votos` WHERE participante_id=".$id. " and fid='".$fid."'";
        $existe_codigo_clasificacion = $query->row();
        //var_dump($existe_codigo_clasificacion);
        foreach ($existe_codigo_clasificacion as $row)
          {
            $existe_codigo_clasificacion = $row;
          }
        //echo $existe_codigo_clasificacion;
            if ($existe_codigo_clasificacion<=0){
		$this->db->query("INSERT INTO `votos` (participante_id,fid,fecha) VALUES($id,'$fid',now())");
		$this->db->query("UPDATE `inscripcion` set votos=votos + 1 where fid=$id");
	    }
        return;
    } 
} 
 ?>