<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestaurantsFoodCtrl extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('RestaurantsFoodModel');
	}

  // function FoodView(){
	// 	$data['msg']="Message:";
	// 	$this->load->view('/Food/RestaurantsFoodView.php',$data);
	// }
	
	


	// function DisplayAll(){
	// 	$result=$this->RestaurantsFoodModel->Displayall();
	// 	$data['result']=$result;
	//   $this->load->view('/Food/RestaurantsFoodDisplayAll.php',$data);
	// }


	// function DisplayByid(){
	// 	$id=$_GET['fid'];
	// 	$result=$this->RestaurantsFoodModel->DisplayByid($id);
	// 	$data['result']=$result;
	// 	$this->load->view('/Food/RestaurantsFoodDisplayById.php',$data);
  // }


	// function FetchAllMenuType(){
	// 	$rid=$_GET['rid'];
	// 	$result=$this->RestaurantsFoodModel->FetchAllMenuType($rid);
	// 	echo json_encode($result);
	// }
	
}
?>