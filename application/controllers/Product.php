<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct(){
		parent::__construct();
	
		//$this->load->model('Product_Series_Type');
	}
	
	//产品类别
	public function index(){
		$data=array();
		$data['title']='产品资料';
		//$data['productType']=$this->Product_Series_Type->GetProductType();
		
		$productType_arr=$this->db->query("select ID,TypeName,ico from Product_Series_Type where PID=5 and IsEnable=1 and IsShow=1 order by TOrder asc")->result_array();
		$smb_arr=$this->db->query("select ID,TypeName,ico from Product_Series_Type where ID=449")->result_array();
		array_splice($productType_arr,-2,0,$smb_arr);  
		//print_r($productType_arr);exit;
		$data['productType']=$productType_arr;
		
		$this->load->view('Product/index',$data);
	}
	
	//产品线
	public function Series($pid){
		$data=array();
		$data['pid']=$pid;
		$data['TypeName']=$this->db->query("select TypeName from Product_Series_Type where ID=".$pid)->row_array()['TypeName'];
		$data['productType']=array();
		$productType=$this->db->query("select ID,TypeName from Product_Series_Type where PID=".$pid." and IsEnable=1 and IsShow=1 order by TOrder asc")->result_array();
		foreach($productType as $Type){
			$series=$this->db->query("SELECT PS.ID, 
											 PS.ProductSeriesName, 
											 PS.Thumbnail 
									    FROM Product_Series_Type_Series_Relation PSTSR,
										  	 Product_Series PS 
									   WHERE 1=1
									   		 AND PSTSR.Series_Id=PS.ID 
									   		 AND PSTSR.Type_Id=".$Type['ID']." 
											 AND PSTSR.IsEnable=1
											 --AND PSTSR.IsWAP=1
											 AND PS.IsShow=1 
											 AND PS.IsEnable=1 
									   ORDER BY PSTSR.ViewOrder ASC")->result_array();
			$other=$this->RecursiveProductType($Type['ID']);
			$Type['series']=array_merge($series,$other);
			
			$data['productType'][]=$Type;
		}
		$this->load->view('Product/series',$data);
	}
	
	//递归查询产品分类下的产品线
	public	function RecursiveProductType($pid){
		$all=array();
		$productType=$this->db->query("select ID from Product_Series_Type where PID=".$pid." and IsEnable=1 and IsShow=1 order by TOrder asc")->result_array();
		if($productType){
			$type_arr=array_column($productType,'ID');
			$type_id=implode(',',$type_arr);
			$series=$this->db->query("SELECT PS.ID, 
											 PS.ProductSeriesName, 
											 PS.Thumbnail 
									    FROM Product_Series_Type_Series_Relation PSTSR,
										  	 Product_Series PS 
									   WHERE 1=1
									   		 AND PSTSR.Series_Id=PS.ID
									   		 AND PSTSR.Type_Id in (".$type_id.")  
											 AND PSTSR.IsEnable=1
											 --AND PSTSR.IsWAP=1
											 AND PS.IsShow=1 
											 AND PS.IsEnable=1 
									   ORDER BY PSTSR.ViewOrder ASC")->result_array();
			$other=array();
			foreach($type_arr as $pid){
				$children=$this->RecursiveProductType($pid);
				$other=array_merge($other,$children);
			}
			
			$all=array_merge($series,$other);
		}
		return $all;
	}
	
	
	//产品详情
	public function Detail($ID){
		$data=array();
		$data['productDetail']=$this->db->query("select PS.ProductSeriesName,
														cast(PSC.ss1 as text) as ss1, 
														cast(PSC.ss2 as text) as ss2, 
														cast(PSC.ss3 as text) as ss3, 
														cast(PSC.ss4 as text) as ss4,
														PA.a1, PA.a2, PA.a3, PA.a4
												from Product_Series PS,
													Product_Series_Content PSC,
													ProductAttributes PA
												where PSC.Uniid=PS.DocID 
													and PA.ProductID=PS.DocID
													and PS.ID=".$ID)->row_array();
		
		$data['productPic']=$this->db->query("select PicPath from ProductPic where ProductID=".$ID." order by Sort asc")->result_array();
		
		//print_r($data);exit;//strip_tags
		$this->load->view('Product/detail',$data);
	}
}
?>