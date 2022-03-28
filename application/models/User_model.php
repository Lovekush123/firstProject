<?php
class User_model extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('users',$data);

   		$insert_id = $this->db->insert_id();

   		return  $insert_id;

        //return true;
	}

	function checkemail($email){

		$sql="select * from users where email='$email'";

		$query=$this->db->query($sql);

		$result=$query->num_rows();

		if($result>0){
			return false;
		}else{
			return true;
		}
	}

	function userProducts($id){
		$sql = "SELECT * FROM userproducts, products WHERE products.id=userproducts.product_id AND user_id=".$id;
		$query = $this->db->query($sql);
		$result=$query->result();
		return $result;
	}

	function fetchAllproducts(){
		$sql = "select * from products";
		$query = $this->db->query($sql);
		$result=$query->result();
		return $result;
	}

	function addProduct($data){

    $result = $this->db->insert('userproducts',$data);

	if($result){
		return true;
	}
  	 return false;
	}

	function updateProduct($data){

	$array = array('user_id' => $data['user_id'], 'product_id' => $data['product_id']);

	$this->db->where($array); 

 //  $this->db->where('user_id',$data['user_id']);

  $result = $this->db->update('userproducts',$data);

	if($result){
		return true;
	}
  	 return false;
	}

	public function productExists($data){

		$sql = "select * from userproducts where user_id=".$data['user_id']." AND product_id=".$data['product_id'];
		$query = $this->db->query($sql);
		$result=$query->num_rows();
		if($result>0){
			return false;
		}else{
			return true;
		}

	}

	public function deleteProduct($data){
	
	$array = array('user_id' => $data['user_id'], 'product_id' => $data['id']);

	$this->db->where($array); 

	$result = $this->db->delete('userproducts');

	if($result){
		return true;
	}else{
		return false;
	}
	
	}

	public function userExist($id){
		$this->db->where('Id',$id);
		$query = $this->db->get('users');
		$result =$query->result();
		if($result){
			return true;
		}
		return false;
	}

	function fetchUser($id){
		$sql = "select * from users where Id=".$id;
		$query = $this->db->query($sql);
		$result=$query->result();
		return $result;
	}

	function UpdateUser($id,$data){
		$this->db->where('Id',$id);
		$query=$this->db->update('users',$data);
		return $query;
	}
	
}