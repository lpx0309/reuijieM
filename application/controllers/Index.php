<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('Addetail');
	}
	
	//首页
	public function index()
	{
		$data=array();
		
		$data=$this->Addetail->GetWap();
		
		$data['productType']=$this->db->query("select ID,TypeName from Product_Series_Type where PID=5 and IsEnable=1 and IsShow=1 order by TOrder asc")->result_array();
		
		$this->load->view('index',$data);
	}
}
?>