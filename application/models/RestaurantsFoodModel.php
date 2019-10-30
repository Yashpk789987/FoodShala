<?php
class RestaurantsFoodModel extends CI_Model {
  function __construct(){
  	parent::__construct();
  	$this->load->database();
	}
	
	function addrecord($value){
		$result=$this->db->insert('food',$value);
		return ($result);
	}

	function deleteById($fid){
		$this->db->where('food.foodid',$fid);
		$result=$this->db->delete('food');
		return($result);
	}

	// function Displayall(){
	// 	$query=$this->db->get('food');
	// 	return ($query->result());
	// }

	function getAllFood(){
		$query=$this->db->query("select f.* , (select r.rname from restaurants r where r.rid = f.rid) as rname from food f");
    return($query->result());
	}

	function getAllFoodsByName($fname,$from,$to,$type){
		if($type == 'all'){
			$query=$this->db->query("select f.* , (select r.rname from restaurants r where r.rid = f.rid) as rname from food f where f.foodname like '%$fname%' and CAST(f.price AS SIGNED integer)   between $from and $to ");
		}else{
			$query=$this->db->query("select f.* , (select r.rname from restaurants r where r.rid = f.rid) as rname from food f where f.foodname like '%$fname%' and CAST(f.price AS SIGNED integer)   between $from and $to and type = '$type' ");
		}
		return($query->result());
	}

	function getAllFoodsByIDS($food_ids_string){
		$query=$this->db->query("select f.* , (select r.rname from restaurants r where r.rid = f.rid) as rname from food f where f.foodid in$food_ids_string ");
		return($query->result());
	}

	function getRidByFoodId($food_ids_string){
		$query=$this->db->query("select distinct (select r.rid from restaurants r where r.rid = f.rid) as rid from food f where f.foodid in$food_ids_string ");
		return($query->result());
	}

	function displayByRid($rid){
		$query=$this->db->query("select * from food where rid='$rid'");
    return($query->result());
	}

  function DisplayByid($id){
		$query=$this->db->get_where('food',array('foodid'=>$id));
		return ($query->row_array());
	}

	function foodEditById($fid,$newPrice){
		$result=$this->db->query("update food set price = '$newPrice' where foodid= $fid ");
	  return($result);
	}


	
  
	
}
?>