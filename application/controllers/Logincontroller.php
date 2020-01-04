<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Logincontroller extends CI_Controller {

	public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('Loginmodel');         
   }
	public function index(){
		$this->load->view('products/loginview');
		$this->load->view('includes/header');
		$modelObject=new Loginmodel();
		$data['data']=$modelObject->getqueryResut();
		$this->load->view('products/loginlistview',$data);
		// echo "<pre>";
		// print_r($data['data']);

	}

	public function insertPostdata(){
		// echo "TEST";
		// echo "<pre>";
		// print_r($_POST);
		$modelObject=new Loginmodel();
		$modelObject->insertDataquery();
		redirect(base_url('logincontroller'));
	}

	public function delete($id){
       $this->db->where('id', $id);
       $this->db->delete('logintable');
       redirect(base_url('logincontroller'));
    }

    public function checkdulicate(){
    	// echo "checkdulicate";
    	$firstname=$this->input->post("firstname");

    	$modelObject=new Loginmodel();
    	$modelObject->isduplicate($firstname);

   echo $firstname;
   echo "sss";
  // exit;
    	// $this->load->view('products/loginview');
    	// print_r($data);
    }
}



