<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//联系
	public function index(){
		$data=array();
		
		$this->load->view('contact',$data);
	}
	
}
?>