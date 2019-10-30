<?php

class UserModel extends CI_Model {
 
	function __construct(){
  	parent::__construct();
  	$this->load->database();
  }

	function signup($values){
    $result=$this->db->insert('user',$values);
    $insert_id = $this->db->insert_id();
		return($insert_id);
  }
  
  function checklogin($email,$password){
    $query=$this->db->query("select * from user where (email='$email' or mobile = '$email') and password = '$password'");
		return($query->result());
  }

}
?>


