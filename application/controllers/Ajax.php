<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		 $this->load->model('admin_login','a');
		//	$this->load->model('employee_m', 'm');
	}

	public function index()
	{
 		$data['employee']= get_table('employee');
 		 $this->load->view('employee',$data);
	}
	public function employeeList()
	{
		$result = $this->a->employeeList();
		echo json_encode($result);
	}
		public function deleteEmployee(){
		$result = $this->a->deleteEmployee();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	
	public function editEmployee(){
		$result = $this->a->editEmployee();
		echo json_encode($result);
	}

 	public function updateEmployee(){
		$result = $this->a->updateEmployee();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function add_employee()
	{
		if ($_POST) {
  	 		$result = $this->a->addEmployee();
			$msg['success'] = false;
			$msg['type'] = 'add';
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
	 	} 
 
	}
}?>