<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscripcion extends CI_Controller{
	public function index()
	{
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		
		$data['nombre'] = form_input('nombre','');
		$data['email'] = form_input('email','');
		$data['ci'] = form_input('ci','');
		$data['ciudad'] = form_input('ciudad','');
		$data['telefono'] = form_input('telefono','');
		$data['direccion'] = form_input('direccion','');
	    
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha_numeric'); 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('ci', 'C&eacute;dula', 'required|numeric|max_length[10]');
		$this->form_validation->set_rules('ciudad', 'Ciudad', 'required|max_length[30]|alpha_numeric');
		$this->form_validation->set_rules('telefono', 'Tel&eacute;fono', 'required|numeric|max_length[10]'); 
		$this->form_validation->set_rules('direccion', 'Direcci&oacute;n', 'required|max_length[300]'); 
                
		if ($this->form_validation->run() == FALSE)
		{
		    $data['title'] = "&iexcl;Arma tu florero! - Inscripci&oacute;n";
		    $this->load->view('header', $data);
		    $this->load->view('inscripcion');
		    $this->load->view('footer');
	
		}
		else
		{
		    $this->load->model('insertar');
		    $this->insertar->guardar();
		    $data['title'] = "&iexcl;Arma tu florero! - Final";
		    $this->load->view('header', $data);
		    $this->load->view('final');
		    $this->load->view('footer');
		}
	}
}