<?php

class RestaurantsModel extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

  // function FetchAllRestaurantsByCity($cityname){
	// 	$query=$this->db->query("select * from restaurants where city in(select cityid from cities where cityname='$cityname')");
	// 	return($query->result());
	// }
	
	// function FetchAllRestaurants($city){
	// 	$query=$this->db->query("select * from restaurants where city=$city");
	//   return($query->result());
	// }
	

  function AddNewRecord($values){
		$result=$this->db->insert('restaurants',$values);
		$insert_id = $this->db->insert_id();
	  return($insert_id);
	}
	
	function DisplayAll(){
		$query=$this->db->query("select r.* , (select s.statename from states s where r.state = s.stateid) as state_s , (select c.cityname from cities c where r.city = c.cityid) as city_c from restaurants r");
		return($query->result());
	}

	function checkLogin($email, $password){
		$query=$this->db->query("select r.*  from restaurants r where r.email = '$email' and r.password = '$password'");
		return($query->row_array());
	}

	function displayByRid($rid){
		$query=$this->db->query("select * from food where rid =  '$rid'");
		return($query->result());
	}


  function DisplayById($id){
		$query=$this->db->query("select * from restaurants where rid=$id");
		return($query->row_array());
	}

  // function EditRecord($id,$values){
	// 	$this->db->where('restaurants.rid',$id);
  //   $result=$this->db->update('restaurants',$values);
	//   return($result);
	// }

	// function DeleteRecord($id){ 
	// 	$this->db->where('restaurants.rid',$id);
	// 	$result=$this->db->delete('restaurants');
	// 	return($result);
	// }

	// function EditPicture($id,$filename){ 
	// 	$result=$this->db->query("update restaurants set logo='$filename' where rid=$id");
  //   return($result);
	// }
}

?>