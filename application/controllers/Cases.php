<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//案例
	public function index(){
		$data=array();
		$data['title']='案例中心';
		$data['video']=$this->db->query("SELECT
										  TOP 2 
										  VC.ID,
										  VC.Title,
										  VC.ImgUrl
									  FROM
										  VideoCenter VC,
										  VideoRelation VR,
										  VideoType VT
									  WHERE 1=1
										  AND VC.ID = VR.VideoID
										  AND VR.VideoTypeUNIID = VT.UNIID
										  AND VT.ID = 51
										  AND VT.IsWAP =1
										  AND VR.IsWAP =1
									  ORDER BY VC.UpdateTime DESC")->result_array();
		
		$data['recommond']=$this->db->query("SELECT DISTINCT
												  TOP 4
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
												  AND ATP.type = 'CSolution' 
												  AND ATP.iswap=1
												  AND ATP.isenable=1
												  AND ATP.isshow=1
												  AND ATP.istag=1
											  ORDER BY A.PublishTime DESC")->result_array();
		$data['industry']=$this->db->query("select ID,SubdivisionName from ArticleType where type='CSolution' and pid=1001 and iswap=1")->result_array();
		
		$this->load->view('Cases/index',$data);
	}
	
	//精选案例
	public function Recommond($page=false){
		$data=array();
		$data['title']='精选案例';
		$all=$this->db->query("SELECT DISTINCT
									--TOP 4
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
									AND ATP.type = 'CSolution' 
									AND ATP.iswap=1
									AND ATP.isenable=1
									AND ATP.isshow=1
									AND ATP.istag=1
								ORDER BY A.PublishTime DESC")->result_array();
		$result=page($all,$page,'Cases','Recommond');
		
		$data['recommond']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		
		$this->load->view('Cases/recommond',$data);
	}
	
	//案例列表
	public function Lists($pid,$page=false){
		$data=array();
		
		$data['SubdivisionName']=$this->db->query("select SubdivisionName from ArticleType where ID=".$pid)->row_array()['SubdivisionName'];
		$data['title']=msicut($data['SubdivisionName']);
		
		$data['industry']=array();
		$data['case']=array();
		
		$industry=$this->db->query("select ID,SubdivisionName from ArticleType where PID=".$pid)->result_array();
		foreach($industry as $in){
			if(msicut($in['SubdivisionName'])=='成功案例'){
				
				$all=$this->db->query("SELECT DISTINCT
										  --TOP 4 
										  A.ID,
										  A.Name,
										  A.PublishTime
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
										  AND ATP.iswap = 1
										  AND ATP.isenable = 1
										  AND ATP.isshow = 1
										  AND ATP.istag = 1
										  AND ATP.ID=".$in['ID']."
									  ORDER BY A.PublishTime DESC")->result_array();
				$result=page($all,$page,'Cases','Lists',$pid);
				
				$data['industry']=$result['data'];
				$data['page_bottom']=$result['page_bottom'];
				
				break;
			}else{
				$data['case'][]=$in;
			}
		}
		
		//print_r($data);exit;
		$this->load->view('Cases/lists',$data);
	}
	
	//案例详情
	public function Artile($id){
		$this->db->query("update Article set CallNum+=1 where ID=".$id);
		
		$data=array();
		$data['detail']=$this->db->query("select A.ID,A.Name,A.HtmlContent,A.Title,A.AddTime,A.CallNum ,A.[Size],A.Attachment,ATP.SubdivisionName
										 from Article A,ArtileRelType ARTP,ArticleType ATP 
										 where 1=1
										 AND A.UNIID = ARTP.AUNIID
									 	 AND ARTP.TUNIID = ATP.UNIID
										 AND A.ID=".$id)->row_array();
		$data['title']=msicut($data['detail']['SubdivisionName']);
		$this->load->view('Cases/artile',$data);
	}
}
?>