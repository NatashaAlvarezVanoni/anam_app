<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instrucciones extends CI_Controller{
	public function index()
	{
		$data['title'] = "&iexcl;Arma tu florero! - Instrucciones";
		$this->load->view('header', $data);
		$this->load->view('instrucciones');
		$this->load->view('footer');
	}
}