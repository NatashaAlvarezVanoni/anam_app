<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Florero extends CI_Controller{
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
		$rosas = null;
		$lirios = null;
		$girasoles = null;
		$maceteros = null;
		
		$form_data = $this->input->post();
		if($this->input->post("rosas") != null){
			foreach ($this->input->post("rosas") as $key_rosas => $value_rosas) {
				$rosas[] = $value_rosas;
			}
		}
		if($this->input->post("lirios") != null){
			foreach ($this->input->post("lirios") as $key_lirios => $value_lirios) {
				$lirios[] = $value_lirios;
			}
		}
		if($this->input->post("girasoles") != null){
			foreach ($this->input->post("girasoles") as $key_girasoles => $value_girasoles) {
				$girasoles[] = $value_girasoles;
			}
		}
		if($this->input->post("maceteros") != null){
			foreach ($this->input->post("maceteros") as $key_maceteros => $value_maceteros) {
				$maceteros[] = $value_maceteros;
			}
		}
		//$rosas[] = $this->input->post("rosas");
		//$lirios[] = $this->input->post("lirios");
		//$girasoles[] = $this->input->post("girasoles");
		//$maceteros[] = $this->input->post("maceteros");
		
		//foreach ($this->input->post("rosas") as $key => $value) {
		//	echo 'ARRAY FIELD - '. $key . ': ' . $value;
		//}
		if($rosas != null || $lirios != null || $girasoles != null || $maceteros != null ){
			
			
			$this->load->model('generar');
			$fid = $this->fb_me['id'];
			$this->generar->generar_imagen($rosas,$lirios,$girasoles,$maceteros,$fid);
			
			$content_data['fid'] = $fid;
			$content_data['fb_app'] = $this->fb_app;
			$content_data['title'] = "&iexcl;Arma tu florero! - Tu Florero";
			
			$this->load->view('header', $content_data);
			$this->load->view('imagen',$content_data);
			$this->load->view('footer');
		}
		else{
			if (isset($this->request_result))
			{
				$content_data['error'] = $this->request_result;
			}
			if ($this->fb_me)
			{
				$content_data['me'] = $this->fb_me;
			}
			$content_data['fb_app'] = $this->fb_app;
			$content_data['title'] = "&iexcl;Arma tu florero! - Arma tu florero";
			$this->load->view('header', $content_data);
			$this->load->view('florero',$content_data);
			$this->load->view('footer');
		}
	}
}