<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instrucciones extends CI_Controller{
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
		if (isset($this->request_result))
		{
			$content_data['error'] = $this->request_result;
		}
		if ($this->fb_me)
		{
			$content_data['me'] = $this->fb_me;
		}
		$content_data['fb_app'] = $this->fb_app;
		
		$content_data['title'] = "&iexcl;Arma tu florero! - Instrucciones";
		$this->load->view('header', $content_data);
		$this->load->view('instrucciones');
		$this->load->view('footer');
	}
}