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
		$this->form_validation->set_rules('ci', 'C&eacute;dula', 'required|numeric|max_length[10]');
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
			$this->insertar->guardar();
			$data['title'] = "&iexcl;Arma tu florero! - Final";
			$this->load->view('header', $content_data);
			$this->load->view('final');
			$this->load->view('footer');
		}
	}
}