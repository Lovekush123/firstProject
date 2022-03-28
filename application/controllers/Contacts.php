<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	
	public function create()
	{
		
		$this->load->view('create');
	}
	public function abc(){
		echo "abc";
	}
}