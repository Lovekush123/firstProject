<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // public variable define
    public $product;

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->config('config');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url', 'form');
        $this->load->helper('file');
    }

    /**
     * Display Data this method.
     *
     * @return Response
     */
    public function index()
    {
        $base['base_url'] = $this->config->item('base_url');

        
        if(isset($this->session->admin)){
                redirect($base['base_url']."/AdminController/index");
        }else{

        $this->load->view('adminlogin',$base);    
        }


    }

    public function adminlogin(){

        $messages=array();

        $messages['status']="";

        $messages['message']="";

        $email=$this->input->post('email');

        $password=md5($this->input->post('password'));

        if(empty($email)){
            die("No access");
        }

        $sql="Select * from admin where username='$email' AND password='$password'"; 

       // echo $sql;die;

        $query = $this->db->query($sql);

        if($query->num_rows()>0){

         $result=$query->result();

         $this->session->set_userdata('admin',$result);

        $messages['message']="success";
        $messages['status']="success";

        }else{
            $messages['status']="success";
            
            $messages['message']="failed";
            
        }

        print_r(json_encode($messages));      
    }
    public function userlogout()
    {
        $base['base_url'] = $this->config->item('base_url');
        session_destroy();
        redirect($base['base_url'].'/Admin/index');
    }

}
