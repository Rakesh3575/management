<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_login extends CI_Model {

	function login($data)
	{
		return $this->db->select('*')
		->from('admin')
		->where('username',$data['username'])
		->where('password',$data['password'])->get()->result();
		//	echo $this->db->last_query();
		// if($rr->num_rows() == 1)
		// {
		// 	return true;
		// }else  { 
		// 	return false;
		// }
	}
	public function insert($table,$data)
	{
		$rrq= $this->db->insert($table,$data);
		echo $this->db->last_query();
		return $rrq;
	}

 
	public function update($tables='',$data='',$id='')
	{
		$this->db->where($id);
		$rr= $this->db->update($tables,$data);
		// echo $this->db->last_query();die;
 		return $rr;

 	}
 	
 	public function get_data_join($id)
 	{
 	// 	$qry=$this->db->query( "select *from subcategory s,category c where s.category_id=c.id");
		//  echo $this->db->last_query();die;
		// return $this->db->query($qry)->result(); 
		$this->db->select('s.id, s.subcategory_name,c.category_name');
		$this->db->from('subcategory as s');
		$this->db->join('category as c','c.id = s.category_id');
		$this->db->where('c.id =', $id);
		
		return $query=$this->db->get()->result();
		echo $this->db->last_query();die;

 	}
	 public function get_cat_data($id)
	{		$qry="select s.* from subcategory s,category c where c.id=s.category_id and  c.id=".$id;
		echo $this->db->last_query();
		# code...
	}
 	public function delete($table,$id)
 	{ 
 		return	$this->db->where('id', $id)->delete($table);
		 //echo $this->db->last_query();
		 //die();
 	}
	function get_data( $table)
	{
	    return $this->db->get($table)->result();	  
	}
	 public function edit_details($tables='',$data='',$id='')
	{
		if($id!=""){
			$this->db->where($id);
			}
	
		$result= $this->db->update($tables,$data);
		//echo $this->db->last_query(); die; 
		return $result;
	}
		public function get_by_id($table,$id='')
	{
		$this->db->where('id',$id);
		return $this->db->get($table)->row();
	}
	public function get_details($tables='',$id='')
	{	  
		if($id!=""){
			$this->db->where($id);
		} 
		$this->db->where('status','1');
	
		$result = $this->db->get($tables)->result();
	  // echo qry(); die; 
		return $result;
	}

	public function inactive_banner($id='',$status='',$table='')
	{
		$this->db->where('banner_id',$id);	
		$this->db->set('status',$status);	
		return $this->db->update($table);	
	}
		public function change_status($id='',$status='',$table='')
	{
		$this->db->where('id',$id);	
		$this->db->set('status',$status);	
		return $this->db->update($table);	
	}

	public function employeeList()
 	{
			$this->db->order_by('created_at', 'desc');
		$query = $this->db->get('employee');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		} 	
	}
	public function addEmployee(){
		$field = array(
			'employee'=>$this->input->post('txtEmployeeName'),
			'address'=>$this->input->post('txtAddress'),
			'created_at'=>date('Y-m-d H:i:s')
			);
		$this->db->insert('employee', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editEmployee(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('employee');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateEmployee(){
		$id = $this->input->post('txtId');
		$field = array(
		'employee'=>$this->input->post('txtEmployeeName'),
		'address'=>$this->input->post('txtAddress'),
		'modified_at'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
		$this->db->update('employee', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function deleteEmployee(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('employee');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}

//UPDATE `category` SET `category_name` = 'ras1' WHERE 3 IS NULL 
// /UPDATE `category` SET `category_name` = 'ras1' WHERE `id` = '3' 