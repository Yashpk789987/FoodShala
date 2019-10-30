<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInterfaceCtrl extends CI_Controller {
 	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
	  $this->load->model("StateCityModel");
	  $this->load->model("RestaurantsModel");
		$this->load->model("RestaurantsFoodModel");
		$this->load->model("UserModel");
		$this->load->model("OrderModel");
	}

	function index(){
			if(isset($_COOKIE['USERID'])){
				$this->load->view('UserInterface/UserInterfaceLoggedInView.php');
			}else{
				$this->load->view('UserInterface/UserInterfaceView.php');
			}
	}

	function getAllFoods(){
		$result = $this->RestaurantsFoodModel->getAllFood();
		echo json_encode($result);
	}

	function getAllFoodsByName(){
		$result = $this->RestaurantsFoodModel->getAllFoodsByName($_GET['fname'],$_GET['from'],$_GET['to'],$_GET['type']);
		echo json_encode($result);
	}

	function getAllFoodsByIDS(){
		$result = $this->RestaurantsFoodModel->getAllFoodsByIDS($_GET['food_ids_string']);
		echo json_encode($result);
	}

	function placeOrder(){
		
		$r_id_s = $this->RestaurantsFoodModel->getRidByFoodId($_GET['food_ids']);
		if(count($r_id_s) == 1){
			$values['rid'] = $r_id_s[0]->rid;
			$values['user_id'] = $_GET['user_id'];
			$values['total_price'] = $_GET['total_price'];
			$values['food_ids'] = $_GET['food_ids'];
			$yrdata= strtotime(date('d-m-Y'));
			$values['date'] = date('d-M-Y', $yrdata);
			$values['time'] = date("h:i a");
			$result = $this->OrderModel->placeOrder($values);
			if($result){
				echo '{"code" : "success"}';
			}else{
				echo '{"code" : "failed"}';
			}
		}else{
			  echo '{"code" : "failed" , "msg" : "You Can  Order Only From One Restaurant "}';
		}
	}

	function checklogin(){
		$result = $this->UserModel->checklogin($_GET['email'],$_GET['password']);
			if(count($result) == 1){
				$cookie_name_1= "USERID";
        $cookie_value_1 = $result[0]->_id;
				setcookie($cookie_name_1, $cookie_value_1, time() + (86400 * 300), "/"); // 86400 = 1 day
				$cookie_name_2 = "UNAME";
        $cookie_value_2 = $result[0]->name;
        setcookie($cookie_name_2, $cookie_value_2, time() + (86400 * 300), "/"); // 86400 = 1 day
			}
		echo json_encode($result);
	}
		
	function signup(){	
		$result = $this->UserModel->signup($_GET);
		if($result){
			  $cookie_name_1= "USERID";
              $cookie_value_1 = $result;
				setcookie($cookie_name_1, $cookie_value_1, time() + (86400 * 300), "/"); // 86400 = 1 day
				$cookie_name_2 = "UNAME";
        $cookie_value_2 = $_GET['name'];
        setcookie($cookie_name_2, $cookie_value_2, time() + (86400 * 300), "/"); // 86400 = 1 day
			echo '{"code" : "success" , "_id" : "'.$result.'"}';
		}else{
      echo '{"code" : "failed"}';
		}

	}

	

	function logout(){
		// if(!isset($_SESSION)){
		// 	session_start();
		// 	session_destroy();
		// 	echo '{"code" : "success"}';
		// }
		setcookie('USERID', FALSE, -1, '/');
		setcookie('UNAME', FALSE, -1, '/');
		echo '{"code" : "success"}';
	}

}