<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the followinsg URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
	//load database in autoload libraries 
	    parent::__construct(); 
	    $this->load->model('Register_Model');         
	}

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('products/register_view');
		$this->load->view('includes/footer');
	}

	public function formvalidation()
	{   
		// echo "<pre>";
		// print_r($_POST);
		$data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname')
        );
		$this->load->library('form_validation');  
		$this->form_validation->set_rules("firstname", "First Name", 'required|alpha');  
        $this->form_validation->set_rules("lastname", "Last Name", 'required|alpha'); 

        if($this->form_validation->run()){
        	//echo "inseted";
	        $modelObject=new Register_Model();
			$data['data']=$modelObject->insertDataquery();
			redirect(base_url('register_controller/showdatalist'));
        }
        else{
        	$this->index();
        }

	}

	public function showdatalist()
	{
		$modelObject=new Register_Model();
		$data['data']=$modelObject->getqueryResut();
		$this->load->view('includes/header');
		$this->load->view('products/datalist_view',$data);
		$this->load->view('includes/footer');
	}
	public function delete($id){
       $this->db->where('id', $id);
       $this->db->delete('logintable');
       redirect(base_url('register_controller/showdatalist'));
       //redirect(base_url('register_controller/showdatalist'));

    }
    public function edit($id)
    {
    	$this->load->view('includes/header');
        $product = $this->db->get_where('logintable', array('id' => $id))->row();
        $this->load->view('products/register_view_edit',array('logintable'=>$product));
        $this->load->view('includes/footer'); 
    }

    public function update($id)
   	{ 
       $products=new Register_Model();
       $products->update_product($id);
       redirect(base_url('register_controller/showdatalist'));
    }

    public function checkdulicate(){
		 $this->load->model('Register_Model'); 
    	//$modelObject->isduplicate($firstname); 
    	if($this->Register_Model->isduplicate($this->input->post('firstname')))
    	{

    		echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span>
    		First Name Already Register</label>';
    		echo "<script>
    				$('#firstname').val('');
    		     </script>";
    	}else{
    		echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span>
    		First Name Available</label>';
    	}
    	
    }

}
