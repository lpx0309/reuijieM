<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//服务
	public function index(){
		$data=array();
		
		$this->load->view('Service/index',$data);
	}
	
	//常见问题
	public function Faq($page=false){
		$data=array();
		
		$all=$this->db->query("SELECT DISTINCT
									  A.ID,
									  A.Name,
									  A.PublishTime
								  FROM
									  Article A,
									  ArtileRelType ARTP,
									  ArticleType ATP
								  WHERE 1=1
									  --AND A.Recommond = 1
									  AND A.Release=1
									  AND A.UNIID = ARTP.AUNIID
									  AND ARTP.TUNIID = ATP.UNIID 
									  AND ATP.type = 'CKnows' 
									  AND ATP.iswap=1
									  AND ATP.isenable=1
									  AND ATP.isshow=1
								  ORDER BY A.PublishTime DESC")->result_array();
		$result=page($all,$page,'Service','Faq');
		
		$data['faq']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		$this->load->view('Service/faq',$data);
	}
	
	//常见问题详情
	public function FaqDetail($id){
		$this->db->query("update Article set CallNum+=1 where ID=".$id);
		
		$data=array();
		$data['detail']=$this->db->query("select ID,Name,HtmlContent,Title,AddTime,CallNum,[Size],Attachment from Article where ID=".$id)->row_array();
		$data['title']=msicut($data['detail']['Name']);
		
		$this->load->view('Service/faqDetail',$data);
	}
	
	//服务网点
	public function Map($id){
		$data=array();
		$data['id']=$id;
		$data['map']=$this->db->query("select ID,Name from Service_Map_City")->result_array();
		$data['info']=$this->db->query("select NAME,[ADD],TEL,FAX,CITY from Service_Map_Info where LOCATION_ID=".$id)->result_array();
		$this->load->view('Service/map',$data);
	}
	
	//停产产品
	public function StopProduct(){
		$data=array();
		$stop=$this->db->query("select ID,SubdivisionName from ArticleType where PID=3223 order by ID asc")->result_array();
		foreach($stop as $s){
			if($s['ID']==3224){
				$s['detail']=$this->db->query("SELECT
									  A.ID
								  FROM
									  Article A,
									  ArtileRelType ARTP,
									  ArticleType ATP
								  WHERE 1 = 1 
									  AND A.UNIID = ARTP.AUNIID
									  AND ARTP.TUNIID = ATP.UNIID
									  AND ATP.ID=".$s['ID'])->row_array()['ID'];
			}else{
				$s['product']=$this->db->query("select ID,SubdivisionName from ArticleType where PID=".$s['ID']." order by ID asc")->result_array();
			}
			$data['stop'][]=$s;
		}
		//print_r($data);
		$this->load->view('Service/stopProduct',$data);
	}
	//停产列表
	public function StopProductList($id,$page=false){
		$data=array();
		$data['SubdivisionName']=$this->db->query("select SubdivisionName from ArticleType where ID=".$id)->row_array()['SubdivisionName'];
		$all=$this->db->query("SELECT DISTINCT
									  A.ID,
									  A.Name,
									  A.AddTime
								  FROM
									  Article A,
									  ArtileRelType ARTP,
									  ArticleType ATP
								  WHERE 1 = 1 
									  AND A.Release=1
									  AND A.UNIID = ARTP.AUNIID
									  AND ARTP.TUNIID = ATP.UNIID
									  AND ATP.iswap = 1
									  AND ATP.isenable = 1
									  AND ATP.isshow = 1
									  AND ATP.ID=".$id." 
								  ORDER BY A.ID DESC")->result_array();
		$result=page($all,$page,'Service','StopProductList',$id);
		
		$data['list']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		$this->load->view('Service/stopProductList',$data);
	}
	//停产详情
	public function StopProductDetail($id){
		$this->db->query("update Article set CallNum+=1 where ID=".$id);
		
		$data=array();
		$data['detail']=$this->db->query("select ID,Name,HtmlContent,Title,AddTime,CallNum,[Size],Attachment from Article where ID=".$id)->row_array();
		$data['title']=msicut($data['detail']['Name']);
		
		$this->load->view('Service/stopProductDetail',$data);
	}
	
	//保修
	public function Policy(){
		$this->db->query("update Article set CallNum+=1 where ID=8006");
		
		$data=array();
		$data['detail']=$this->db->query("select ID,Name,HtmlContent,Title,AddTime,CallNum from Article where ID=8006")->row_array();
		$data['title']=msicut($data['detail']['Name']);
		
		$this->load->view('Service/policy',$data);
	}
	
	
}
?>