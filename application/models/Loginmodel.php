<?php
class Loginmodel extends CI_Model{
	public function insertDataquery(){
		// echo "DATA MODEl";
// print_r($_POST);
// exit;
		$data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        );
        return $this->db->insert('logintable', $data);
	}

	public function getqueryResut(){
		$query = $this->db->get("logintable");
		//How to print Query;
        return $query->result();

	}

	public function isduplicate($name){
		$this->db->select('firstname');
		$this->db->where("firstname",$name);
	}

}
?>
