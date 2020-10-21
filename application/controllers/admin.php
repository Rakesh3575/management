<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_login','a');
				//  	if(!$this->session->userdata('admin'))
		// {
				// 	print_r($this->session->userdata('admin'));die();
				// 	redirect(base_url());
			// }
	}
	public function index()
	{
		$this->load->view("login");
	}
	public function admin_login()
	{
		$data = array('username' => $this->input->post('username'),'password' => $this->input->post('password'));
		$result = $this->a->login($data);
		
		if($result)
			{ 	$this->session->set_userdata('admin',$result);
		$this->session->set_flashdata('user', array('class' => 'success','tag' => 'yeahh','user' => 'Successfully Login' ) );
		redirect('category');
	}
	else
	{
		$this->session->set_flashdata('user',array('class' => 'danger','tag' => 'Oops','user' => 'Something Went Wrong!!' ) );
		redirect(base_url());
	}
	$this->load->view("login");
}
public function view_category()
{
	if(!$this->session->userdata('admin'))
	{
				//	 print_r($this->session->userdata('admin'));die();
		redirect(base_url());
	}
	$data['category'] = $this->a->get_data('category');
	$this->load->view('view_category',$data);
}
public function add_category()
{
	$category = array('category_name' => $_POST['category_name']);
	$restult = $this->a->insert('category',$category);
			$this->db->last_query();//die();
			if($restult)
			{
				redirect('category');
			}
		}
		public function view_subcategory()
		{
			$data['subcategory'] = $this->a->get_data('subcategory');
			$data['category'] = $this->a->get_data('category');
			$this->load->view('view_subcategory',$data);
		}
		public function add_subcategory()
		{
			$data = array('subcategory_name'=>$_POST['subcategory_name'],'category_id'=>$_POST['category_id']);

			$result =$this->a->insert('subcategory',$data);
//echo $this->db->last_query();
			if($result)
			{
				$this->session->set_flashdata('user',array('class'=>'success','tag'=>'yeahh','user'=>'Successfully Added'));
				redirect('admin/view_subcategory');
			}else
			{
				$this->session->set_flashdata('user',array('class'=>'danger','tag'=>'Oops','user'=>'something went Wrong!!'));
				redirect('admin/view_subcategory');
			}
		}
		public function edit_category()
		{
			if($_POST){
//print_r($_POST);die();
				$data['category_name']=$this->input->post('category_name');
				$id['id']=$this->input->post('id');
				$result=$this->a->update('category',$data,$id);
				if($result)
				{
					$this->session->set_flashdata('user',array('class'=>'success','tag'=>'yeahh','user'=>'Successfully updated'));
					redirect('category' );
				}else
				{
					$this->session->set_flashdata('user',array('class'=>'danger','tag'=>'Oops','user'=>'something went Wrong!!'));
				}
			}
			$id=$this->uri->segment(2);
			if($id){
				$data['edit_cat'] =$this->a->get_by_id('category',$id);
			}
			$this->load->view('edit_category',$data);
		}
		public function edit_subcategory()
		{
			if($_POST)
			{
				$id['id']= $_POST['id'];
//print_r($_POST);die();
				$data = array('subcategory_name'=>$_POST['subcategory_name'],'category_id'=>$_POST['category_id']);
				$result=$this->a->update('subcategory',$data,$id);
				if($result)
				{
					$this->session->set_flashdata('user',array('class'=>'success','tag'=>'yeahh','user'=>'Successfully updated'));
					redirect('admin/view_subcategory' );
				}else
				{
					$this->session->set_flashdata('user',array('class'=>'danger','tag'=>'Oops','user'=>'something went Wrong!!'));
					redirect('admin/view_subcategory' );
				}
			}
			$id=$this->uri->segment(2);
//if($id){
			$data['edit_subcat'] =$this->a->get_by_id('subcategory',$id);
				//		$data['joincategory'] =$this->a->get_data_join($id);
				//		}
			$data['category'] = $this->a->get_data('category');
		// print_r($data['joincategory']);die();
			$this->load->view('edit_subcategory',$data);
		}
		public function update()
		{
			if($_POST)
			{
//print_r($_POST);die;
				$data = array('id'=>$_POST['id'],'subcategory_name'=>$_POST['subcategory_name'],'category_id'=>$_POST['category_id']);
//$id=$this->input->post('id');
				$result=$this->a->update('subcategory',$data,$id);
				echo $this->db->last_query();
				if($result)
				{
					$this->session->set_flashdata('user',array('class'=>'success','tag'=>'yeahh','user'=>'Successfully updated'));
					redirect('category' );
				}else
				{
					$this->session->set_flashdata('user',array('class'=>'danger','tag'=>'Oops','user'=>'something went Wrong!!'));
				}
			}
		}
		public function delete_subcategory()
		{
			$id=$this->uri->segment(2);
	//print_r($id);die();
			$result = $this->a->delete('subcategory',$id);
			if($result)
			{
				$this->session->set_flashdata('user',array('class'=>'success','tag'=>'yeahh','user'=>'Successfully Delete'));
				redirect('admin/view_subcategory');
			}else
			{
				$this->session->set_flashdata('user',array('class'=>'danger','tag'=>'Oops','user'=>'something went Wrong!!'));
				redirect('admin/view_subcategory');
			}
		}

//============Banner========================
public function view_banner()
{
	if(!$this->session->userdata('admin'))
	{
		//	 print_r($this->session->userdata('admin'));die();
		redirect(base_url());
	}
	$data['banner'] = $this->a->get_data('banner_mstr');
	$this->load->view('view_banner',$data);
}
public function add_banner()
{
	if($_POST)
	{
		$config = array(
			'upload_path' => "./uploads/banner/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024",
		'file_name'  => time()."~".$_FILES['banner']['name']);
		// $this->load->library('upload', $config);
		// print_r($config); die("d");
					$this->upload-> initialize($config);
					$upload=$this->upload->do_upload('banner');
		if($upload)
		{//die("uplod");
				$file_name=$this->upload->data('file_name');
				$data = array('upload_data' =>$file_name );
			}else
			{
			 	$file_name='';
				$error = array('error' => $this->upload->display_errors());
			}
				$now = date('Y-m-d H:i:s');
				$data = array( "title" => $_POST['title'],'banner'=>$file_name, "created_at"=>$now);
				//print_r($data);die("c");
				 $result = $this->a->insert('banner_mstr',$data);
			if($result)
			{
				$this->session->set_flashdata('message',array('class' => 'success','tag'=>'Yeahh','message'=>"Successfully Banner Added.." )); 
			}else
			{
				$this->session->set_flashdata('message', array('class' =>'danger' ,'tag'=>'Oops','message'=>"Something Went Wrong.."));
			}
		redirect('view_banner');
	}

 	$data['banner'] = $this->a->get_data('banner_mstr');  
	$this->load->view('view_banner',$data);
}

public function inactive_banner( )
{ 
	$id= $this->uri->segment(2);
	$status= 0;
	$result= $this->a->inactive_banner($id,$status,'banner_mstr');
	if($result)
	{
		$this->session->set_flashdata('message',array('class' => 'success','tag'=>'Yeahh','message'=>"Successfully Change Status.." )); 
	}else
	{
		$this->session->set_flashdata('message', array('class' =>'danger' ,'tag'=>'Oops','message'=>"Something Went Wrong.."));
	}
	redirect('view_banner');
}
public function active_banner( )
{ 
	$id= $this->uri->segment(2);
	// print_r($id);die("st");
	$status= 1;
	$result= $this->a->inactive_banner($id,$status,'banner_mstr');
	if($result)
	{
		$this->session->set_flashdata('message',array('class' => 'success','tag'=>'Yeahh','message'=>"Successfully Change Status.." )); 
	}else
	{
		$this->session->set_flashdata('message', array('class' =>'danger' ,'tag'=>'Oops','message'=>"Something Went Wrong.."));
	}
	redirect('view_banner');
}

public function edit_banner()
{if($_POST)
	{  $config = array(
		'upload_path' => "./uploads/banner/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024",
		'file_name'  => time()."~".$_FILES['banner']['name']);
	$this->upload-> initialize($config);
	if($this->upload->do_upload('banner'))
	{
		$file_name=$this->upload->data('file_name');
		//$data = array('upload_data' =>$file_name );
	}
	else
	{
		$file_name=$_POST['old_banner'];
		$error = array('error' => $this->upload->display_errors());
	} 
	$now = date('Y-m-d H:i:s');
	$data = array("title" => $_POST['title'],'banner'=>$file_name, "created_at"=>$now);
	$id['banner_id'] = $_POST['id'];
 	$result = $this->a->edit_details('banner_mstr',$data,$id);
	if($result)
	{
		$this->session->set_flashdata('message',array('class' => 'success','tag'=>'Yeahh','message'=>"Successfully Banner Added.." )); 
	}else
	{
		$this->session->set_flashdata('message', array('class' =>'danger' ,'tag'=>'Oops','message'=>"Something Went Wrong.."));
	}
	redirect('view_banner');
} 
$id['banner_id']= $this->uri->segment(2);
 $data['edit_banner']= $this->a->get_details('banner_mstr',$id);
		// print_r($data['edit_banner']);die("st");
$this->load->view('edit_banner',$data);
}
 
 //============view_country========================

public function view_country() {
	 	$data['country'] = $this->db->query("select * from country")->result_array();
 		$this->load->view('view_country', $data);
		
		if ($_POST) {
			$data = array(
				'name' => $this->input->post('name'),
			);
		 	$r = $this->db->insert('country', $data);
			$insert_id = $this->db->insert_id();

			if ($insert_id) {

				$this->session->set_flashdata('message',array('class'=>'success','tag'=>'Yeahh','message'=>'Country has been added successfully..!!'));
 			} else {
 			$this->session->set_flashdata('message',array('class'=>'danger','tag'=>'Oops','message'=>'Request Failed.Please Try again..!!'));
				} 
 			redirect("view_country");
		}
	}

	public function edit_country() {
 
  	if ($_POST) {
 	$data = array("name" => $_POST['name'] );
	$id['id'] = $_POST['cid'];
    $result = $this->a->edit_details('country',$data,$id);
	$updateted_status = $this->db->affected_rows();
	 
	if ($updateted_status > 0) {
	$this->session->set_flashdata('message',array('class'=>'success','tag'=>'Yeahh','message'=>'Country was Updated successfully.'));
	} else {
		$this->session->set_flashdata('message',array('class'=>'danger','tag'=>'Oops','message'=>'Request Failed.Please Try again..!!'));
					}
	redirect('view_country');
	}

		$id['id'] = $this->uri->segment(2);
 		$data['country'] = $this->a->get_details('country',$id); 
	  	$this->load->view('edit_country',$data );
   	}
public function inactive_country( )
{ 
	$id= $this->uri->segment(2);
	$status= 0;
 	$result= $this->a->change_status($id,$status,'country');
  	if($result)
	{
		$this->session->set_flashdata('message',array('class' => 'success','tag'=>'Yeahh','message'=>"Successfully Change Status.." )); 
	}else
	{
		$this->session->set_flashdata('message', array('class' =>'danger' ,'tag'=>'Oops','message'=>"Something Went Wrong.."));
	}
	redirect('view_country');
}

public function active_country( )
{ 
	$id= $this->uri->segment(2);
 	$status= 1;
	$result= $this->a->change_status($id,$status,'country');
	if($result)
	{
		$this->session->set_flashdata('message',array('class' => 'success','tag'=>'Yeahh','message'=>"Successfully Change Status.." )); 
	}else
	{
		$this->session->set_flashdata('message', array('class' =>'danger' ,'tag'=>'Oops','message'=>"Something Went Wrong.."));
	}
	redirect('view_country');
}

//============view_state========================
 
 public function view_state() {
		$data['state'] = $this->db->query("select * from state")->result_array();
		$data['country'] = get_table('country');
		$this->load->view('view_state', $data);
		if ($_POST) {
			$arrayName = array('name' => $_POST['name'], 'country_id' => $_POST['country_id']);
			/* echo "<pre>"; print_r($arrayName); die();*/
			$this->db->insert('state', $arrayName);
 			$insert_id = $this->db->insert_id();
 			if ($insert_id) {

				$this->session->set_flashdata('message',array('class'=>'success','tag'=>'Yeahh','message'=>'Country has been added successfully..!!'));
 			} else {
 			$this->session->set_flashdata('message',array('class'=>'danger','tag'=>'Oops','message'=>'Request Failed.Please Try again..!!'));
				} 

 			redirect("view_state");
		}
	}
	public function edit_state() {
	  	
		$id['id'] = $this->uri->segment(2);
 		$data['state'] = $this->a->get_details('state',$id); 
	  	$data['country'] = get_table('country');
	  // echo p($data['country']); 
		$this->load->view('edit_state',$data );

 		if ($_POST) {
			$data = array('name' => $_POST['name'], 'country_id' => $_POST['country_id']);
	 	 	$id['id'] = $_POST['id'];
			 
			$result = $this->a->edit_details('state',$data,$id);
			$updateted_status = $this->db->affected_rows();
	 
	if ($updateted_status > 0) {
	
				$this->session->set_flashdata('message',array('class'=>'success','tag'=>'Yeahh','message'=>'State has been Updated successfully..!!'));
 			} else {
 			$this->session->set_flashdata('message',array('class'=>'danger','tag'=>'Oops','message'=>'Request Failed.Please Try again..!!'));
				} 
				redirect('view_state');
		}
	}




} ?>