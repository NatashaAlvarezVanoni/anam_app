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
	public function index()
	{
		require_once(APPPATH."libraries/facebook-php-sdk/src/facebook.php");
		
		$app_id = "446610158788817"; // Your application id
		$app_secret = "bbbadb37442092163d6c24a59736e839"; // Your application secret
		$page_id = "464559146990910";
		
		$config = array(
		    'appId' => $app_id,
		    'secret' => $app_secret,
		    'fileUpload' => false, // optional
		    'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
		    'cookie' => true
		);
		
		$facebook = new Facebook($config);
		
		$params = array(
		  'scope' => 'read_stream, friends_likes','email',
		  'redirect_uri' => 'https://juanxinho.webfactional.com/flores-app-new/instrucciones'
		);
		
		$login_url = $facebook->getLoginUrl($params);
		$user = $facebook->getUser();

		
		$signedrequest = $facebook->getSignedRequest();
		$fbp_id = $signedrequest["page"]["id"]; //Facebook Fan Page ID
		//echo $is_admin = $signedrequest["page"]["admin"]; echo " Page Admin <br>";
		//echo $is_liked = $signedrequest["page"]["liked"]; echo " Page Liked<br>";
		//echo $uid=$facebook->getUser(); echo " User ID<br>";
		
		//$isFan = $facebook->api(array(
		//	"method" => "fql.query",
		//	"query"  => "SELECT uid FROM page_fan WHERE page_id = '464559146990910' AND uid = '$user'"
		//));
		//echo $isFan;
		
		//if ($user) {
		//try {
		//	$likes = $facebook->api("/me/likes/464559146990910");
		//	if( !empty($likes['data']) )
		//	    $fan = true;
		//	else
		//	    $fan = false;
		//      } catch (FacebookApiException $e) {
		//	error_log($e);
		//	$user = null;
		//      }
		//}
		//$data['isfan'] = $is_liked;
		$data['loginUrl'] = $login_url;
		//echo $loginUrl;
		$data['title'] = "&iexcl;Arma tu florero! - Inicio";
		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->view('footer');
	}
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */