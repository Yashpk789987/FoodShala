<?php
  class OrderModel extends CI_Model {
    function __construct(){
      parent::__construct();
      $this->load->database();
    }
    
    function placeOrder($values){
      $result = $this->db->insert('food_order',$values);
      return $result;
    }

    function getAllOrdersByRid($rid){
      $query1=$this->db->query("select o.* , u.name as uname , u.mobile as umobile , u.email as uemail from food_order o , user u  where u._id = o.user_id and  rid=$rid order by _id desc");
      $orders = $query1->result();
      $food_items = array(array());
      foreach($orders as $row){
        $query2=$this->db->query("select * from food where foodid in $row->food_ids");
        array_push($food_items,$query2->result());
      }
      $result = array();
      array_push($result,$orders,$food_items);
      return $result;
    }
	}
?>
