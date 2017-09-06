<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solution extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('Addetail');
	}
	
	//解决方案
	public function index(){
		//getimagesize();
		$data=array();
		$data=$this->Addetail->GetSolution();
		$this->load->view('Solution/index',$data);
	}
	
	//业务解决方案详情
	public function Strategic($pid){
		if(!is_numeric($pid)){
			$pid='3285';
		}
		$data=array();
		$data['SubdivisionName']=$this->db->query("select SubdivisionName from ArticleType where ID=".$pid)->row_array()['SubdivisionName'];
		$data['info']=$this->db->query("SELECT 
								  --A.ID,
								  --A.Name,
								  A.HtmlContent
							  FROM
								  Article A,
								  ArtileRelType ARTP,
								  ArticleType ATP
							  WHERE 1 = 1 
								  --AND A.Recommond = 1
								  AND A.Release = 1
								  AND A.UNIID = ARTP.AUNIID
								  AND ARTP.TUNIID = ATP.UNIID
								  --AND ATP.type = 'CSolution'
								  --AND ATP.iswap = 1
								  --AND ATP.isenable = 1
								  --AND ATP.isshow = 1
								  --AND ATP.istag = 1
								  AND ATP.PID=".$pid."
								  AND ATP.SubdivisionName = '".msicgb('方案概述')."'
								  ")->row_array();
		
		$data['frame']=$this->db->query("SELECT 
								  --A.ID,
								  --A.Name,
								  A.HtmlContent
							  FROM
								  Article A,
								  ArtileRelType ARTP,
								  ArticleType ATP
							  WHERE 1 = 1 
								  --AND A.Recommond = 1
								  AND A.Release = 1
								  AND A.UNIID = ARTP.AUNIID
								  AND ARTP.TUNIID = ATP.UNIID
								  --AND ATP.type = 'CSolution'
								  --AND ATP.iswap = 1
								  --AND ATP.isenable = 1
								  --AND ATP.isshow = 1
								  --AND ATP.istag = 1
								  AND ATP.PID=".$pid."
								  AND ATP.SubdivisionName = '".msicgb('方案架构')."'
								  ")->row_array();
		$data['value']=$this->db->query("SELECT 
								  --A.ID,
								  --A.Name,
								  A.HtmlContent
							  FROM
								  Article A,
								  ArtileRelType ARTP,
								  ArticleType ATP
							  WHERE 1 = 1 
								  --AND A.Recommond = 1
								  AND A.Release = 1
								  AND A.UNIID = ARTP.AUNIID
								  AND ARTP.TUNIID = ATP.UNIID
								  --AND ATP.type = 'CSolution'
								  --AND ATP.iswap = 1
								  --AND ATP.isenable = 1
								  --AND ATP.isshow = 1
								  --AND ATP.istag = 1
								  AND ATP.PID=".$pid."
								  AND ATP.SubdivisionName = '".msicgb('方案价值')."'
								  ")->row_array();
		
		
		//print_r($data);exit;
		$this->load->view('Solution/strategic',$data);
	}
	
	//行业解决方案列表
	public function Industry($pid){
		$data=array();
		$data['SubdivisionName']=$this->db->query("select SubdivisionName from ArticleType where ID=".$pid)->row_array()['SubdivisionName'];
		$data['industry']=array();
		$industry=$this->db->query("select ID,SubdivisionName from ArticleType where PID=".$pid)->result_array();
		foreach($industry as $in){
			$in['solution']=$this->db->query("SELECT DISTINCT
									  TOP 4 
									  A.ID,
									  A.Name,
									  A.AddTime
								  FROM
									  Article A,
									  ArtileRelType ARTP,
									  ArticleType ATP
								  WHERE 1 = 1 
									  --AND A.Recommond = 1
									  AND A.Release = 1
									  AND A.UNIID = ARTP.AUNIID
									  AND ARTP.TUNIID = ATP.UNIID
									  AND ATP.type = 'CSolution'
									  --AND ATP.iswap = 1
									  AND ATP.isenable = 1
									  AND ATP.isshow = 1
									  --AND ATP.istag = 1
									  AND ATP.ID=".$in['ID']."
								  ORDER BY A.AddTime DESC")->result_array();
			$data['industry'][]=$in;
		}
		$this->load->view('Solution/industry',$data);
	}
	
	//行业解决方案列表更多
	public function More($id,$page=false){
		$data=array();
		$data['SubdivisionName']=$this->db->query("select SubdivisionName from ArticleType where ID=".$id)->row_array()['SubdivisionName'];
		$all=$this->db->query("SELECT DISTINCT
								  --TOP 4 
								  A.ID,
								  A.Name,
								  A.AddTime
							  FROM
								  Article A,
								  ArtileRelType ARTP,
								  ArticleType ATP
							  WHERE 1 = 1 
								  --AND A.Recommond = 1
								  AND A.Release = 1
								  AND A.UNIID = ARTP.AUNIID
								  AND ARTP.TUNIID = ATP.UNIID
								  AND ATP.type = 'CSolution'
								  --AND ATP.iswap = 1
								  AND ATP.isenable = 1
								  AND ATP.isshow = 1
								  --AND ATP.istag = 1
								  AND ATP.ID=".$id."
							  ORDER BY A.AddTime DESC")->result_array();
		
		$result=page($all,$page,'Solution','More',$id);
		
		$data['solution']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		
		$this->load->view('Solution/more',$data);
	}
	
	//行业解决方案详情
	public function Detail($id){
		$this->db->query("update Article set CallNum+=1 where ID=".$id);
		
		$data=array();
		$data['detail']=$this->db->query("select ID,Name,HtmlContent,Title,AddTime,CallNum,[Size],Attachment from Article where ID=".$id)->row_array();
		$data['title']=msicut($data['detail']['Name']);
		$this->load->view('Solution/detail',$data);
	}
}
?>