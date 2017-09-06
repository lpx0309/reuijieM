<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeedBack extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	//反馈
	public function index(){
		$data=array();
		
		$data['name']='';
		$data['mail']='';
		$data['tel']='';
		$data['content']='';
		
		$data['mail_vali']='none';
		$data['tel_vali']='none';
		$data['content_vali']='none';
		
		$post=$this->input->post();
		if($post){
			//print_r($post);
			$data['name']=$post['name'];
			$data['mail']=$post['mail'];
			$data['tel']=$post['tel'];
			$data['content']=$post['content'];
			$vali=0;
			if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$post['mail'])){
				$data['mail_vali']='block';
				$vali++;
			}
			if(!preg_match('/^1[358]\d{9}$/',$post['tel'])){
				$data['tel_vali']='block';
				$vali++;
			}
			if(!$post['content']){
				$data['content_vali']='block';
				$vali++;
			}
			if($vali==0){
				/*$sql=msicgb("insert into Feedback (EntiretySuggest,RealName,Email,Phone,CreateDate,IP)
									values ('".$post['content']."','".$post['name']."','".$post['mail']."','".$post['tel']."'
									,'".date('Y-m-d H:i:s')."','".$this->input->ip_address()."')");*/
				$sql=msicgb("insert into APP_feedback (Tel,Name,Content,Mail,AddTime)
									values ('".$post['tel']."','".$post['name']."','".$post['content']."','".$post['mail']."','".date('Y-m-d H:i:s')."')");
				$this->db->query($sql);
				echo '<script>alert("提交成功！");window.location="'.makeurl('FeedBack').'"</script>';
			}
		}
		$this->load->view('feedback',$data);
	}
	
}
?>