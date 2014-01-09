<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagen extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

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
		//$content_data['last_status'] = $this->fb_ignited->api('/me/feed?limit=5');
		$content_data['fb_app'] = $this->fb_app;
		//$content_data['login_login'] = $this->fb_ignited->fb_login_url();
		
		$content_data['title'] = "&iexcl;Arma tu florero! - Inicio";
		$this->load->view('header', $content_data);
		$this->load->view('imagen');
		$this->load->view('footer');
	}
	function view_feed() {
		
	}
	
	function callback()
	{
		// This method will include the facebook credits system.
		$content_data['message'] = $this->fb_ignited->fb_process_credits();
		$this->load->view('fb_credits_view', $content_data);
	}
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */