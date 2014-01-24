<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscripcion extends CI_Controller{
	function __construct()
	{
		parent::__construct();		
		
		// The fb_ignited library is already auto-loaded so call the user and app.
		$this->fb_me = $this->fb_ignited->fb_get_me(true);		
		$this->fb_app = $this->fb_ignited->fb_get_app();
		
		// This is a Request System I made to be used to work with Facebook Ignited.
		// NOTE: This is not mandatory for the system to work.
		if ($this->input->get('request_ids'))
		{
			$requests = $this->input->get('request_ids');
			$this->request_result = $this->fb_ignited->fb_accept_requests($requests);
		}
	}
	public function index()
	{
		
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		
		$content_data['nombre'] = form_input('nombre','');
		$content_data['email'] = form_input('email','');
		$content_data['ci'] = form_input('ci','');
		$content_data['ciudad'] = form_input('ciudad','');
		$content_data['telefono'] = form_input('telefono','');
		$content_data['direccion'] = form_input('direccion','');
	    	    
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha_numeric'); 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('ci', 'C&eacute;dula', 'required|numeric|max_length[10]|callback_cedula_check');
		$this->form_validation->set_rules('ciudad', 'Ciudad', 'required|max_length[30]|alpha_numeric');
		$this->form_validation->set_rules('telefono', 'Tel&eacute;fono', 'required|numeric|max_length[10]'); 
		$this->form_validation->set_rules('direccion', 'Direcci&oacute;n', 'required|max_length[300]'); 
                
		if ($this->form_validation->run() == FALSE)
		{
		    $content_data['title'] = "&iexcl;Arma tu florero! - Inscripci&oacute;n";
		    $this->load->view('header', $content_data);
		    $this->load->view('inscripcion');
		    $this->load->view('footer');
	
		}
		else
		{
			if (isset($this->request_result))
			{
				$content_data['error'] = $this->request_result;
			}
			if ($this->fb_me)
			{
				$content_data['me'] = $this->fb_me;
			}
			$content_data['fb_app'] = $this->fb_app;
			$this->load->model('insertar');
			$this->insertar->guardar($this->fb_me['id']);
			$data['title'] = "&iexcl;Arma tu florero! - Arma tu florero";
			$this->load->view('header', $content_data);
			//COMENTADO PARA PANTALLA DE PRIMERA FASE
			//$this->load->view('florero');
			$this->load->view('final');
			$this->load->view('footer');
		}
	}
	public function cedula_check($str){
		if(is_null($str) || empty($str)){
			$this->form_validation->set_message('cedula_check', 'Compruebe que su n&uacute;mero de c&eacute;dula sea correcto');
			return FALSE;
		}else{
			if(is_numeric($str)){ 
				$total_caracteres=strlen($str);// se suma el total de caracteres
				if($total_caracteres==10){//compruebo que tenga 10 digitos la cedula
					$nro_region=substr($str, 0,2);//extraigo los dos primeros caracteres de izq a der
					if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
						$ult_digito=substr($str, -1,1);//extraigo el ultimo digito de la cedula
						//extraigo los valores pares//
						$valor2=substr($str, 1, 1);
						$valor4=substr($str, 3, 1);
						$valor6=substr($str, 5, 1);
						$valor8=substr($str, 7, 1);
						$suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
						$valor1=substr($str, 0, 1);
						$valor1=($valor1 * 2);
						if($valor1>9){ $valor1=($valor1 - 9); }else{ }
						$valor3=substr($str, 2, 1);
						$valor3=($valor3 * 2);
						if($valor3>9){ $valor3=($valor3 - 9); }else{ }
						$valor5=substr($str, 4, 1);
						$valor5=($valor5 * 2);
						if($valor5>9){ $valor5=($valor5 - 9); }else{ }
						$valor7=substr($str, 6, 1);
						$valor7=($valor7 * 2);
						if($valor7>9){ $valor7=($valor7 - 9); }else{ }
						$valor9=substr($str, 8, 1);
						$valor9=($valor9 * 2);
						if($valor9>9){ $valor9=($valor9 - 9); }else{ }
	
						$suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
						$suma=($suma_pares + $suma_impares);
						$dis=substr($suma, 0,1);//extraigo el primer numero de la suma
						$dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
						$digito=($dis - $suma);
						if($digito==10){ $digito='0'; }else{ }//si la suma nos resulta 10, el decimo digito es cero
						if ($digito==$ult_digito){//comparo los digitos final y ultimo
							return TRUE;
						}else{
							$this->form_validation->set_message('cedula_check', 'Compruebe que su n&uacute;mero de c&eacute;dula sea correcto');
							return FALSE;
						}
					}else{
						$this->form_validation->set_message('cedula_check', 'Compruebe que su n&uacute;mero de c&eacute;dula sea correcto');
						return FALSE;
					}
				}else{
				$this->form_validation->set_message('cedula_check', 'Compruebe que su n&uacute;mero de c&eacute;dula sea correcto');
				return FALSE;
				//echo "Es un Numero y tiene solo".$total_caracteres;
				}
			}else{
				$this->form_validation->set_message('cedula_check', 'Compruebe que su n&uacute;mero de c&eacute;dula sea correcto');
				return FALSE;
				//echo "Esta Cedula no corresponde a un Nro de Cedula de Ecuador";
			}
		}
	}
}