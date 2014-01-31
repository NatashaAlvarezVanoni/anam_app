<?php
class Generar extends CI_Model{
    public function generar_imagen($rosas,$lirios,$girasoles,$maceteros,$fid) {
        $error = false;
        //define("SERVER_DIRECTORY", realpath(dirname(__FILE__)));
        define('SERVER_DIRECTORY','/home/juanxinho/webapps/jnietos/flores-app');
        
        if (!file_exists("uploads")){
	    mkdir("uploads");
	}
	
	if (!file_exists("uploads/{$fid}")){
	    mkdir("uploads/{$fid}");
	}
	
	putenv('GDFONTPATH=' . realpath('./fonts/'));

	//$filename = "uploads/{$fid}/florero-final.jpg";
        $filename =  SERVER_DIRECTORY . "/uploads/". $fid ."/florero-final.jpg";
	//$full_filename = realpath(dirname(__FILE__)) . "/" . $filename;
	
	$rosa_final = null;
	$lirio_final = null;
	$girasol_final = null;
	$macetero_final = null;
	
	if($rosas != null){
	    foreach($rosas as &$rosa) {
		$rosa_final .= ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. SERVER_DIRECTORY . "/img/rosas/". $rosa .'\'" ';
	    }
	}
	if($lirios != null){
	    foreach($lirios as &$lirio) {
		$lirio_final .= ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. SERVER_DIRECTORY . "/img/lirios/". $lirio .'\'" ';
	    }
	}
	if($girasoles != null){
	    foreach($girasoles as &$girasol) {
		$girasol_final .= ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. SERVER_DIRECTORY . "/img/girasoles/". $girasol .'\'" ';
	    }
	}
	if($maceteros != null){
	    foreach($maceteros as &$macetero) {
		$macetero_final .= ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. SERVER_DIRECTORY . "/img/maceteros/". $macetero .'\'" ';
	    }
	}
	
        //$rosas =  SERVER_DIRECTORY . "/img/rosas/". $rosas;
        //$lirios =  SERVER_DIRECTORY . "/img/lirios/". $lirios;
        //$girasoles =  SERVER_DIRECTORY . "/img/girasoles/". $girasoles;
        //$maceteros =  SERVER_DIRECTORY . "/img/maceteros/". $maceteros;
        
        $image_magick = "/usr/bin/convert";
        
//        $command = $image_magick.' -quality 85 "'.$rosas.'" '.
//	  ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. $girasoles .'\'" ' .
//	  ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. $lirios .'\'" ' .
//        ' -gravity NorthWest -draw "image Over   0,0 0,0 \''. $maceteros .'\'" ' .
//	  ' -fill white -opaque none "'.$filename.'"';

	$command = $image_magick.' -quality 85  "/home/juanxinho/webapps/jnietos/flores-app/img/base.png"'.
	$rosa_final . $lirio_final .$girasol_final .$macetero_final.
	' -fill white -opaque none "'.$filename.'"';
	
	@exec($command);
	@unlink($file);
	
	if ($error){
            return false;
		//echo json_encode(array("status"=>"FAIL"));
	}else{
            return true;
	   //echo json_encode(array("status"=>"OK", "file" => $filename,"thumb"=>'uploads/'.$fid.'/'. $filename));
	}   
    }
} 
 ?>