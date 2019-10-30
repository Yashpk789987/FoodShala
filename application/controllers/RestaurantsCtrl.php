<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestaurantsCtrl extends CI_Controller {
 	function __construct(){
	  parent::__construct();
	    $this->load->model("RestaurantsModel");
			$this->load->model("StateCityModel");
			$this->load->model('RestaurantsFoodModel');
			$this->load->model("OrderModel");
   	}

  function index(){
		$values['msg'] = '';
		$this->load->view('RestaurantIndex.php',$values);
	}
	
	function getAllRestaurants(){
	  $result=$this->RestaurantsModel->DisplayAll();
	  echo json_encode($result);
	}

	function showOrders(){
		if(!isset($_SESSION)){ 
			session_start(); 
		} 
		if(isset($_SESSION['restaurant'])){
			$result=$this->OrderModel->getAllOrdersByRid($_SESSION['restaurant']['rid']);
			$values['orders_food'] = $result ; 
		  $this->load->view("DisplayAllOrders.php",$values);
		}else{
			$this->login();
		}
	}


 

	function checkLogin(){
		$result=$this->RestaurantsModel->checkLogin($_POST['email'],$_POST['password']);
		if($result){
			if(!isset($_SESSION)){ 
        session_start(); 
			} 
			
			$_SESSION['restaurant'] = $result;
			$this->showMenu();
    }else{
      $data['msg']="Invalid Email Id /Password..";
      $this->load->view("restaurantlogin",$data);
     }
	}

	function showMenu(){
		if(!isset($_SESSION)){ 
			session_start(); 
		} 
		if(isset($_SESSION['restaurant'])){
			$foods=$this->RestaurantsModel->displayByRid($_SESSION['restaurant']['rid']);
			$values['foods'] = $foods ; 
			$this->load->view("RestaurantDashBoard.php",$values);
		}else{
			$this->login();
		}
		
	}

  function login(){
		$data['msg'] = "";
		$this->load->view("restaurantlogin.php",$data);
	}

	function logout(){
		if(!isset($_SESSION)){
			session_start();
		}
		session_destroy();
        redirect('http://foodshala.unaux.com/');
		//$this->login();
	}

  function addFoodItem(){
		if(!isset($_SESSION)){ 
      session_start(); 
		} 
		if(isset($_SESSION['restaurant'])){
			$data['msg'] = '';
			$this->load->view("Food/RestaurantsFoodView.php",$data);
		}else{
			$this->login();
		}
	}

 	function register(){
		$data['msg']="Message:";
		$this->load->view("RestaurantsInterface.php",$data);
  }

	function deleteFoodItem(){
		if(!isset($_SESSION)){ 
      session_start(); 
		} 
		if(isset($_SESSION['restaurant'])){
			$result = $this->RestaurantsFoodModel->deleteById($_GET['fid']);
		  $this->showEditDelete();
		}else{
			$this->login();
		}
	}

	function foodEditDelete(){
		$result = $this->RestaurantsFoodModel->DisplayByid($_GET['fid']);
	  echo json_encode($result)	;
	}
	
	function foodEditById(){
		$result = $this->RestaurantsFoodModel->foodEditById($_GET['fid'],$_GET['price']);
		if($result){
			echo '{"code" : "success"}' ;
		}else{
			echo '{"code" : "failed"}'  ;
		}
	}

	function insertFoodItem(){
		session_start();
	  $value['foodname']=$_POST['foodname'];
		$value['price']=$_POST['price'];
	  $value['rid'] = $_SESSION['restaurant']['rid'];
		$value['type']=$_POST['type'];
	
		$result=$this->RestaurantsFoodModel->addrecord($value);
	  if($result){
		  $data['msg']='Record Submitted..';
		}else{
			$data['msg']='Fail to Submit Record..';
		}
		$this->showMenu();
	}

	function AddNewRecord(){
		$values['password']=$_POST['password'];
		$values['rname']=$_POST['rname'];
		$values['address']=$_POST['address'];
		// $values['location']=$_POST['location'];
		// $values['city']=$_POST['city'];
		// $values['state']=$_POST['state'];
		$values['phone']=$_POST['phone'];
		$values['email']=$_POST['email'];
		
		// $filename=$_FILES['logo']['name'];
		// $values['logo']=$filename;
		$result=$this->RestaurantsModel->AddNewRecord($values);
		$values['rid'] = $result;
		if($result){
			// move_uploaded_file($_FILES['logo']['tmp_name'],"images/$filename");
			if(!isset($_SESSION)){ 
        session_start(); 
			} 
			$_SESSION['restaurant'] = $values;
			$this->showMenu();
			$data['msg']='Record Submitted';
		}else{
			$data['msg']='Fail To Submit Record..';
		}
	}

  
	
	function showEditDelete(){
		if(!isset($_SESSION)){ 
      session_start(); 
		} 
		if(isset($_SESSION['restaurant'])){
			$foods=$this->RestaurantsModel->displayByRid($_SESSION['restaurant']['rid']);
			$values['foods'] = $foods ; 
			$this->load->view("Food/RestaurantsFoodEditDelete.php",$values);
		}else{
			$this->login();
		}
	}

  
}
?>

