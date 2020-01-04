<?php
class Register_Model extends CI_Model{
	public function insertDataquery(){
// 		echo "DATA MODEl";
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

	public function update_product($id) 
    {
        $data=array(
            'firstname' => $this->input->post('firstname'),
            'lastname'=> $this->input->post('lastname')
        );
        if($id==0){
            return $this->db->insert('logintable',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('logintable',$data);
        }        
    }

    public function isduplicate($name){
		// $this->db->select('firstname');
		// $this->db->where("firstname",$name);
		$this->db->where("firstname",$name);
		$query=$this->db->get("logintable");
		$count=$query->num_rows();
		if($query->num_rows()>0){
			return true;
		}else{
			return false;
		}

	}

}
?>
