<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//关于
	public function index(){
		$data=array();
		
		$this->load->view('about',$data);
	}
	
}
?>