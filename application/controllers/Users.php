<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
	{

	parent::__construct();
	
	$this->load->database();
	
	$this->load->model('User_model');

	$this->config->load('config');

	$this->load->library('session');

 	$this->load->library('email');

    $this->load->helper(array('form','url'));
			
         /* Load form validation library */ 
    $this->load->library('form_validation');


	$base['base_url'] = $this->config->item('base_url');

	}

	public function index()
	{

		$base['base_url'] = $this->config->item('base_url');
		
		if(isset($this->session->result)){

			redirect($base['base_url']."/../users/profile");

		}else{

		$this->load->view('register',$base);
		
		}

	}



	public function savedata()
	{
		  $this->load->helper('url');

		  $messages = array();

		  $this->load->library('form_validation');

		  $base['base_url'] = $this->config->item('base_url');

  
		  $data['firstName']= $this->input->post('firstName');
		  $data['lastName']= $this->input->post('lastName');
		  $data['email']= $this->input->post('email');
			
		  $data['password']=md5($this->input->post('password'));

		  $data['created_at']=date("Y/m/d H:i:s");
		
		  $data['updated_at']=date("Y/m/d H:i:s");

		  $response = $this->User_model->checkemail($data['email']);

			if(empty($data['firstName'])){
			die("Session Expired");
			}

			if($response==false){
				$messages['email']="Email exists";
				$messages['success']="failed";
			}else{

			$messages['email']="";	
			$messages['success']="";	

			$data['status']=0;

			$response=$this->User_model->saverecords($data);

			if(!empty($response)){


			       
		/*	$config = Array(
					'protocol'=> 'smtp',
					'smtp_host'=> 'smtp.googlemail.com',
					'smtp_port'=> 465,
					'smpt_user'=> 'kindlebit.php@gmail.com',
					'smtp_pass'=> 'kzeorphlptupetsxx',
					'mailtype'=>'html',
					'charset'=>'iso-8859-1',
					'wordwrap'=>TRUE
			);

		$this->load->library('email',$config);
        $from_email = "lovekushsharma786786@gmail.com";
        $this->email->from($from_email, 'Identification');
        $this->email->to("lovekushsharma786786@gmail.com");*/


  		$message = "<h1>You have Successfully Registered.</h1>";

		$message.= "<a href=".$base['base_url']."/users/emailVerify/".$response."> click here to Verify your mail.</a>";

        //$this->email->subject('Email Verification');
        //$this->email->message($message);


		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <webmaster@example.com>' . "\r\n";

		$to = $data['email'];

		$subject='Email Verification';

		//echo $message."to:".$to."subject".$subject;die(" .....");

		mail($to,$subject,$message,$headers);

       
		
		$messages['success']="success";

			}
			else{
					echo "Insert error !";
			}
		}
		
		print_r(json_encode($messages));

		}

		public function login(){

		$base['base_url'] = $this->config->item('base_url');

		if(isset($this->session->result)){

			redirect($base['base_url']."/../users/profile");

		}else{

		$this->load->view('login',$base);	
		
		}
		

		}

		public function loginLogic(){

		$this->form_validation->set_rules('password', 'password', 'required');
	
		$this->form_validation->set_rules('email', 'email', 'required');

		$messages=array();

		$messages['status']="";

		$messages['message']="";


		$email=$this->input->post('email');


		$password=md5($this->input->post('password'));



	    $sql="Select * from users where email='$email' AND password='$password'"; 

	    $query = $this->db->query($sql);

	    if($query->num_rows()>0){

	    $sql="Select * from users where email='$email' AND password='$password' AND status=0"; 

	    $query = $this->db->query($sql);

			if($query->num_rows()>0){
			$messages['status']="failed";
			$messages['message']="failed";
		}else{

	     $sql="Select * from users where email='$email' AND password='$password' AND status=1"; 

	     $query = $this->db->query($sql);

	     $result=$query->result();

	     $this->session->set_userdata('result',$result);

	    $messages['message']="success";
	    $messages['status']="success";

		}

	    }else{
	    	
	    	$messages['message']="failed";
	    	
	    }

	    print_r(json_encode($messages));

		}


		public function emailVerify($id){

		if(empty($id)){
			die("Link Expired");
		}

 		$response = $this->User_model->userExist($id);

		 if(!$response){
			die("User does not Exists Or User does not exists");
		 }

		$base['base_url'] = $this->config->item('base_url');

		$sql = "update users set status=1 where Id=".$id;

		$query = $this->db->query($sql);

		if($query){

			$message = "Your Email has been verified Successfully";

			$message.="<a href=".$base['base_url']."/users/login> click here to login </a>";

			echo $message;

		}else{
			echo "Failed Verification!";
		}
		}

		public function profile(){

		$base['base_url'] = $this->config->item('base_url');

		if(isset($this->session->result)){

		$result = $this->session->result;

		$id=$result[0]->Id;

		$base['base_url'] = $this->config->item('base_url');

		$base['result']=$this->User_model->fetchAllproducts();

		$base['products']=$this->User_model->userProducts($id);

		$this->load->view('header',$base);

		$this->load->view('userProfile',$base);		
		
		}else{
			redirect($base['base_url']."/users/login");
		}

		}

		public function addProduct(){

		if(isset($this->session->result)){

		$result = $this->session->result;

		$data['product_id']=$this->input->post('_productId');

		$data['user_id']=$result[0]->Id;

		$data['quantity']=$this->input->post('quantity');

		$data['price']=$this->input->post('price');

		$data['created_at']=date("Y/m/d H:i:s");
		$data['updated_at']=date("Y/m/d H:i:s");

		$response = $this->User_model->productExists($data);

		if($response){
		
		$response = $this->User_model->addProduct($data);
		if($response){
			echo "data Inserted Successfully";
			redirect($base['base_url'].'/../users/profile');
			//redirect(base_url('/users/savedata'));
		}else{
			echo "Failed Insertion";
		}	
		
		}else{
				
		$response=$this->User_model->updateProduct($data);

		if($response){
			echo "data Updated Successfully";
			redirect($base['base_url'].'/../users/profile');
		}else{
			echo "Failed Insertion";
		}
		}

	}else{
		echo "Session Expired";
		redirect($base['base_url'].'/users/login');
	}

		}

	public function deleteProduct($id){


			if(empty($id)){
				die("Link Expired");
			}



		if(isset($this->session->result)){

		$result = $this->session->result;

		$data['user_id']=$result[0]->Id;

		$data['id']=$id;
		
		$response = $this->User_model->deleteProduct($data);

		if($response){
				echo "Data Deleted Successfully.";
				redirect($base['base_url'].'/../users/profile');

			}else{
				echo "Failed Deletion.";
			}
		 }



	}

	public function sessionread(){

			$this->load->library('session');

			$this->session->set_userdata('name',"lovekush");

			echo $this->session->name;

	}


	public function myProfile($id){

		if(empty($id)){
			die("Link Expired...");
		}


	  $response = $this->User_model->userExist($id);


	  if($response){

		$base['base_url'] = $this->config->item('base_url');

		if(isset($this->session->result)){

	  	$result = $this->User_model->fetchUser($id);

	  	$data['result']=$result;

		$this->load->view("header",$data);

		$this->load->view("myProfile");
	}else{
		echo "session expired";
		redirect($base['base_url'].'/../users/login');
	}

	  }else{
	  	echo "User does not exit...";
	  }


	}


	public function updateData($id)
	{
		$base['base_url'] = $this->config->item('base_url');

		if(isset($this->session->result)){


		  $this->load->helper('url');

		  $messages = array();

		  $this->load->library('form_validation');

		  $base['base_url'] = $this->config->item('base_url');

  
		  $data['firstName']= $this->input->post('firstName');
		  $data['lastName']= $this->input->post('lastName');
			
		  //$data['password']=md5($this->input->post('password'));
		
		  $data['updated_at']=date("Y/m/d H:i:s");

			$messages['success']="";	

			$response=$this->User_model->UpdateUser($id,$data);

			if(!empty($response)){

			$messages['success']="success";

			}
			else{
					echo "Insert error !";
			}
		
		
		print_r(json_encode($messages));

		}else{
			echo "session expired";
			redirect($base['base_url'].'/../users/login');
		}
	}

	public function userlogout()
	{
		$base['base_url'] = $this->config->item('base_url');
		session_destroy();
		redirect($base['base_url'].'/users/login');
	}

	
}

