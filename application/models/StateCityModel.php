<?php

class StateCityModel extends CI_Model {
 
	function __construct(){
  	parent::__construct();
  	$this->load->database();
  }

	function FetchAllCity(){
		$query=$this->db->get('cities');
		return($query->result());
	}

  function DisplayAllState(){
		$query=$this->db->get('states');
		return($query->result());
	}

  function DisplayAllCities($stateid){
		$query=$this->db->query("select * from cities where stateid=$stateid");
		return($query->result());
	}

}
?>


