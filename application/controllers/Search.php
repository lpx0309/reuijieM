<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//搜索
class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page=false){
		$data=array();
		$data['title']='搜索';
		
		$data['type']=$this->input->get('type');
		$data['kw']=str_replace("'","",trim($this->input->get('kw')));
		
		if($data['kw']){
			$kw=msicgb($data['kw']);
			
			switch($data['type']){
				case 'product':
					$sql="SELECT DISTINCT
								PS.ID,
								PS.ProductSeriesName as Name
						   FROM Product_Series_Type_Series_Relation PSTSR,
							    Product_Series PS,
							    Product_Series_Type PST
						  WHERE 1=1
							  	AND PSTSR.Series_Id=PS.ID
							  	AND PSTSR.Type_Id=PST.ID
							  	AND PSTSR.Type='product'
							  	AND PSTSR.Type_Id!=''
								--AND PSTSR.IsWAP=1
								AND PSTSR.IsEnable=1
								AND PS.IsEnable=1
								AND PS.IsShow=1
								AND PST.IsEnable=1
								AND PST.IsShow=1
								AND PS.ProductSeriesName like '%".$kw."%' 
						  ORDER BY PS.ID DESC";
					$all=$this->db->query($sql)->result_array();
				break;
				
				case 'faq':
					$all=$this->db->query("SELECT DISTINCT
												A.ID,
												A.Name
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
												AND (A.Name LIKE '%".$kw."%' --OR A.HtmlContent LIKE '%".$kw."%'
											) ORDER BY A.ID DESC")->result_array();
				break;
				
				default:
					$product_sql="SELECT DISTINCT
										PS.ID,
										PS.ProductSeriesName as Name,
										PS.AddTime
								   FROM Product_Series_Type_Series_Relation PSTSR,
										Product_Series PS,
										Product_Series_Type PST
								  WHERE 1=1
										AND PSTSR.Series_Id=PS.ID
										AND PSTSR.Type_Id=PST.ID
										AND PSTSR.Type='product'
										AND PSTSR.Type_Id!=''
										--AND PSTSR.IsWAP=1
										AND PSTSR.IsEnable=1
										AND PS.IsEnable=1
										AND PS.IsShow=1
										AND PST.IsEnable=1
										AND PST.IsShow=1
										AND PS.ProductSeriesName like '%".$kw."%' 
								  ORDER BY PS.ID ASC";
					$product=$this->db->query($product_sql)->result_array();
				
					$article_sql="SELECT DISTINCT
										A.ID,
										A.Name,
										-- A.UpdateTime,
										ATP.type
										--ATP.istag
									FROM
										Article A,
										ArtileRelType ARTP,
										ArticleType ATP
									WHERE 1=1
										AND A.Release=1
										AND A.UNIID = ARTP.AUNIID
										AND ARTP.TUNIID = ATP.UNIID 
										AND ATP.iswap=1
										AND ATP.isenable=1
										AND ATP.isshow=1
										AND ATP.type in ('CNews','CSolution','CKnows')
										AND A.Name like '%".$kw."%' 
									ORDER BY A.ID DESC";
					$article=$this->db->query($article_sql)->result_array();
					
					$video_sql="SELECT DISTINCT
									  VC.ID,
									  VC.Title AS Name
								  FROM
									  VideoCenter VC,
									  VideoRelation VR,
									  VideoType VT
								  WHERE 1=1
									  AND VC.ID = VR.VideoID
									  AND VR.VideoTypeUNIID = VT.UNIID
									  AND VT.IsWAP =1
									  AND VR.IsWAP =1
									  AND VC.Title like '%".$kw."%'
								  ORDER BY VC.ID DESC";
					$video=$this->db->query($video_sql)->result_array();
					
					$all=array_merge($product,$article,$video);
				break;
			}
			
			$result=page($all,$page,'Search','','','?type='.$data['type'].'&kw='.$data['kw']);
			
			$data['result']=$result['data'];
			$data['page_bottom']=$result['page_bottom'];
		}else{
			$data['result']='';
			$data['page_bottom']='';
		}
		
		$this->load->view('search',$data);
	}


}
?>