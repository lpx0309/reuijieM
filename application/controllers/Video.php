<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//视频
	public function index(){
		$data=array();
		$data['title']='视频中心';
		$data['recommond']=$this->db->query("SELECT TOP 1 
												VC.ID,VC.Title,VC.ImgUrl,VC.VideoUrl,VC.HtmlText,VC.ClickNum,VC.UpNum,VC.DownNum
											  FROM 
											  	VideoCenter VC,
												VideoRelation VR,
												VideoType VT
											  WHERE 1=1
											  	AND VC.ID = VR.VideoID 
											  	AND VR.VideoTypeUNIID = VT.UNIID
											  	-- AND VC.Recommond = 1
											  	AND VT.IsWap=1
												AND VR.IsWAP =1
											  ORDER BY VC.UpdateTime DESC")->row_array();
		$data['recommond']['url']=$this->VideoUrl($data['recommond']['VideoUrl'],$data['recommond']['HtmlText']);
		$this->db->query("update VideoCenter set ClickNum+=1 where ID=".$data['recommond']['ID']);
		
		$data['product']=$this->db->query("SELECT
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
										  AND VT.ID = 20
										  AND VT.IsWAP =1
										  AND VR.IsWAP =1
									  ORDER BY VC.ID DESC")->result_array();
		
		$data['solution']=$this->db->query("SELECT
										  TOP 4 
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
										  AND VT.ID = 22
										  AND VT.IsWAP =1
										  AND VR.IsWAP =1
									  ORDER BY VC.UpdateTime DESC")->result_array();
		
		$this->load->view('Video/index',$data);
	}
	
	//产品播放列表
	public function ProductList($page=false){
		$data=array();
		$data['title']='产品视频';
		$all=$this->db->query("SELECT
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
								AND VT.ID = 20
								AND VT.IsWAP =1
								AND VR.IsWAP =1
							ORDER BY VC.ID DESC")->result_array();
		$result=page($all,$page,'Video','ProductList');
		
		$data['list']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		
		$this->load->view('Video/list',$data);
	}
	
	//解决方案播放列表
	public function SolutionList($page=false){
		$data=array();
		$data['title']='解决方案视频';
		$all=$this->db->query("SELECT
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
								  AND VT.ID = 22
								  AND VT.IsWAP =1
								  AND VR.IsWAP =1
							  ORDER BY VC.UpdateTime DESC")->result_array();
		$result=page($all,$page,'Video','SolutionList');
		
		$data['list']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		
		$this->load->view('Video/list',$data);
	}
	
	//案例播放列表
	public function CaseList($page=false){
		$data=array();
		$data['title']='案例视频';
		$all=$this->db->query("SELECT
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
		$result=page($all,$page,'Video','CaseList');
		
		$data['list']=$result['data'];
		$data['page_bottom']=$result['page_bottom'];
		$this->load->view('Video/list',$data);
	}
	
	//播放页
	public function Play(){
		$id=$this->input->get('ID');
		$this->db->query("update VideoCenter set ClickNum+=1 where ID=".$id);
		
		$data=array();
		$data['title']='视频播放';
		$data['id']=$id;
		$data['video']=$this->db->query("SELECT ID,Title,ImgUrl,VideoUrl,HtmlText,ClickNum,UpNum,DownNum
											  FROM VideoCenter
											  WHERE ID = ".$id)->row_array();
		$data['video']['url']=$this->VideoUrl($data['video']['VideoUrl'],$data['video']['HtmlText']);
		$data['corr']=$this->db->query("SELECT DISTINCT
										  TOP 2
										  VC.ID,
										  VC.Title,
										  VC.ImgUrl
									  FROM
										  VideoCenter VC,
										  VideoCorrelation VCL,
										  VideoRelation VR,
										  VideoType VT
									  WHERE 1=1
										  AND VC.ID = VR.VideoID
										  AND VR.VideoTypeUNIID = VT.UNIID
										  AND VCL.VideoID = ".$id."
										  AND VCL.CorrVideoID != VCL.VideoID
										  AND VCL.CorrVideoID = VC.ID
										  AND VT.IsWAP =1
										  AND VR.IsWAP =1
									  ORDER BY VC.ID DESC")->result_array();
		$this->load->view('Video/play',$data);
	}
	
	//播放插件
	public function Plugin($id){
		$data=array();
		$url=$this->db->query("SELECT VideoUrl,
									   HtmlText
									   FROM VideoCenter
									   WHERE ID = ".$id)->row_array();
		$youku=msicut($url['HtmlText']);
		preg_match('/src="(.*)"/isU',$youku,$youku_arr);
		
		if($youku_arr){
			$data['url']=$youku_arr[1];
		}else{
			$data['url']=msicut($url['VideoUrl']);
		}
		
		$this->load->view('Video/plugin',$data);
	}
	
	//url转换
	public function VideoUrl($url,$html=false){
		if($html){
			$youku=msicut($html);
			preg_match('/src="(.*)"/isU',$youku,$youku_arr);
			if($youku_arr){
				$protype=$youku_arr[1];
			}else{
				$protype=$html;
			}
			$tmp=str_replace('http://player.youku.com/player.php/sid/','http://player.youku.com/embed/',$protype);
			$videoUrl=str_replace('/v.swf','',$tmp);
		}else{
			$videoUrl=msicut($url);
		}
		return $videoUrl;
	}
	
	//顶
	public function UpDown(){
		//print_r($this->input->post());
		if($this->input->post('val')==1){
			$updown='UpNum';
		}else{
			$updown='DownNum';
		}
		$this->db->query("update VideoCenter set ".$updown."+=1 where ID=".$this->input->post('id'));
	}
}
?>