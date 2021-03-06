<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		//$this->fb_ignited->fb_check_permissions('publish_stream,email,offline_access', true); 
		//NO SIRVE, DA ERROR
		//$this->is_fan = $this->fb_ignited->fb_is_liked();
		
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
		//echo $_REQUEST["fb_sig_page_id"];
		//echo $this->is_fan;
		//echo $this->fb_ignited->fb_is_liked();
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
		$this->load->view('index');
		$this->load->view('footer');
	}
	//public function is_fan() {
	//	$our_page_id = '464559146990910'; // This should be string
	//	$user_is_fan = false;
	//	$likes = $this->fb_ignited->facebook->api( '/me/likes?fields=id' );
	//	foreach( $likes['data'] as $page ) {
	//	    if( $page['id'] === $our_page_id ) {
	//		$user_is_fan = true;
	//		return $user_is_fan;
	//	    }
	//	}
	//	
	//}
	
	function callback()
	{
		// This method will include the facebook credits system.
		$content_data['message'] = $this->fb_ignited->fb_process_credits();
		$this->load->view('fb_credits_view', $content_data);
	}
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */