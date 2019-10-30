<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StateCityController extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('StateCityModel');
  }

  function getAllStates(){
    $result=$this->StateCityModel->DisplayAllState();
    echo json_encode($result);
  }

  function getAllCities(){
    $Cstate=$_GET['Cstate'];
    $result=$this->StateCityModel->DisplayAllCities($Cstate);
    echo json_encode($result);
  }
}
?>