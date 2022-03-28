<?php


class ProductModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->config('config');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url', 'form');
        $this->load->helper('file');
    }

    public function get_product()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('title', $this->input->get("search"));
            $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("products");
        return $query->result();
    }


    public function insert_product()
    {       
        $filepath = explode('application',__DIR__)[0]."uploads/";

        //file upload code 
        //set file upload settings 
        $config['upload_path'] =  $filepath;
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['file_name'] = time().$_FILES['image']['name'];
        
        // Load upload library 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // file upload
        if ($this->upload->do_upload('image')) {
            // Get data about the file
            $uploadData = $this->upload->data();
        }
        $data = array(
            'title'     => $this->input->post('title'),
            'description'  => $this->input->post('description'),
            'image'   => $config['file_name'],
            'status' => $this->input->post('status')
        );
        return $this->db->insert('products', $data);
    }


    public function update_product($id)
    {
        $filepath = explode('application',__DIR__)[0]."uploads/";
        
        //file upload code 
        //set file upload settings 
        $config['upload_path'] =$filepath;
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['file_name'] = time().$_FILES['image']['name'];
        
        // Load upload library 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // file upload
        if ($this->upload->do_upload('image')) 
        {
            // Get data about the file
            $uploadData = $this->upload->data();
        }

        $data = array(
            'title'     => $this->input->post('title'),
            'description'  => $this->input->post('description'),
            'image'   => $config['file_name'],
            'status' => $this->input->post('status')
        );

        if ($id == 0) {
            return $this->db->insert('products', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('products', $data);
        }
    }

    public function find_product($id)
    {
        return $this->db->get_where('products', array('id' => $id))->row();
    }


    public function delete_product($id)
    {
        return $this->db->delete('products', array('id' => $id));
    }
}
