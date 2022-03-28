<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
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
        $this->Product = new ProductModel;
    }

    /**
     * Display Data this method.
     *
     * @return Response
     */
    public function index()
    {
        $data['data'] = $this->Product->get_product();

        $base['base_url'] = $this->config->item('base_url');

        
        if(isset($this->session->admin)){
        $this->load->view('products/adminProductList', $data);
        }else{
             redirect($base['base_url'].'/Admin/index');
        }

      
    }

    /**
     * Show Details this method.
     *
     * @return Response
     */
    public function show($id)
    {
        $base['base_url'] = $this->config->item('base_url');
        if(isset($this->session->admin)){
        $this->Product->find_product($id);
        }else{
             redirect($base['base_url'].'/Admin/index');
        }


       // $this->Product->find_product($id);
    }

    /**
     * Create from display on this method.
     *
     * @return Response
     */
    public function create()
    {
        $base['base_url'] = $this->config->item('base_url');
          if(isset($this->session->admin)){
         $this->load->view('products/adminProduct');
        }else{
             redirect($base['base_url'].'/Admin/index');
        }      

        //$this->load->view('products/adminProduct');
    }

    /**
     * Store Data from this method.
     *
     * @return Response
     */
    function store()
    {
        $base['base_url'] = $this->config->item('base_url');

          if(isset($this->session->admin)){

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'image file', 'required');
        }

        if ($this->form_validation->run() == false)
        {
            // $_SESSION['errors'] = validation_errors();
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('AdminController/create'));

        }else{
            $this->Product->insert_product();
            $this->session->set_flashdata('errors', 'Prodouct is added successfully!');
            redirect(base_url('AdminController/index'));
        } 
        }else{
             redirect($base['base_url'].'/Admin/index');
        }      
       
    }

    /**
     * Edit Data from this method.
     *
     * @return Response
     */
    public function edit($id)
    {

        $base['base_url'] = $this->config->item('base_url');
          if(isset($this->session->admin)){
        $product = $this->Product->find_product($id);
        $this->load->view('products/adminProductEdit', array('product' => $product));
        }else{
             redirect($base['base_url'].'/Admin/index');
        }      


    }

    /**
     * Update Data from this method.
     *
     * @return Response
     */
    public function update($id)
    {

        $base['base_url'] = $this->config->item('base_url');
          if(isset($this->session->admin)){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'image file', 'required');
        }

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('AdminController/edit/'.$id));

        }else{
            $this->Product->update_product($id);
            $this->session->set_flashdata('errors', 'Prodouct is updated successfully!');
            redirect(base_url('AdminController/index'));
        } 
        }else{
             redirect($base['base_url'].'/Admin/index');
        }   


    }

    /**
     * Delete Data from this method.
     *
     * @return Response
     */
    public function delete($id)
    {

        $base['base_url'] = $this->config->item('base_url');
          if(isset($this->session->admin)){
        $this->Product->delete_product($id);
        $this->session->set_flashdata('errors', 'Prodouct is deleted successfully!');
        redirect(base_url('AdminController/index'));
        }else{
             redirect($base['base_url'].'/Admin/index');
        }    

    }
}
