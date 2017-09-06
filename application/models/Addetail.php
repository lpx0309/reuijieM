<?php
class Addetail extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	//获取首页精选
	public function GetWap(){
		$data=array();
		
		$data['banner']=$this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Dnf' order by [Order] asc")->result_array();
		$data['product']=$this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Dnf-Product' order by [Order] asc")->result_array();
		$data['solution']=$this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Dnf-solution' order by [Order] asc")->result_array();
		$data['case']=$this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Dnf-case' order by [Order] asc")->result_array();
		
		return $data;
	}
	
	public function GetSolution(){
		$data=array();
		$data['yewu']=array_chunk($this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Solution-yewu' order by [Order] asc")->result_array(),2);
		$data['Industry']=array_chunk($this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Solution-Industry' order by [Order] asc")->result_array(),3);
		$data['ruiyi']=$this->db->query("select Imgurl,Adurl from Addetail where Isshow=1 and Typecode='WAP-Solution-ruiyi' order by [Order] asc")->row_array();
		
		return $data;
	}
}
?>