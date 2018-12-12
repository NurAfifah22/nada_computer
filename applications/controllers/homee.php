<?php  
/**
 * 
 */
class Homee extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('home');
	}
	function index()
	{
		$x['data']=$this->home->get_data();
		$this->load->view('v_home', $x);
	}
}
?>