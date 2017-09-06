<?php
class Product_Series_Type extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	//获取产品
	public function GetProductType(){
		
		$productType_arr=$this->db->query("select ID,TypeName,ico from Product_Series_Type where PID=5 and IsEnable=1 and IsShow=1 order by TOrder asc")->result_array();
		$smb_arr=$this->db->query("select ID,TypeName,ico from Product_Series_Type where ID=449")->result_array();
		array_splice($productType_arr,-2,0,$smb_arr);  
		//print_r($productType_arr);exit;
		return $productType_arr;
								
	}
	
}
?>