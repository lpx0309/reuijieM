<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//新闻
	public function index($id,$page=false){
		$data=array();
		
		$all=$this->db->query("SELECT A.ID,
									  A.Name
								  FROM
									  Article A,
									  ArtileRelType ARTP,
									  ArticleType ATP
								  WHERE
									  1 = 1
									  --AND A.Recommond = 1
									  AND A.Release = 1
									  AND A.UNIID = ARTP.AUNIID
									  AND ARTP.TUNIID = ATP.UNIID
									  AND ATP.type = 'CNews'
									  AND ATP.iswap = 1
									  AND ATP.isenable = 1
									  AND ATP.isshow = 1
									  AND ATP.ID=".$id."
								  ORDER BY A.ID DESC")->result_array();
		$result=page($all,$page,'News','',$id);
		
		$data['news']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		
		$this->load->view('News/index',$data);
	}
	
	public function Detail($id){
		$this->db->query("update Article set CallNum+=1 where ID=".$id);
		
		$data=array();
		$data['detail']=$this->db->query("select ID,Name,HtmlContent,Title,AddTime,CallNum,[Size],Attachment from Article where ID=".$id)->row_array();
		$data['title']=msicut($data['detail']['Name']);
		
		$this->load->view('News/detail',$data);
	}
	
}
?>