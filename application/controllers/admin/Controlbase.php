<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlbase extends CI_Controller {
    
   	public function __construct() {
	    parent::__construct();
        $this->load->helper('url');
		$this->load->model('LivinInteriorsModel');
		if(!$this->session->userdata('user_username')){ 
			// redirect('Login');
			if($this->uri->segment(1) == "Controlbase" && 
			   ($this->uri->segment(2) == "" || $this->uri->segment(2) == undefined || $this->uri->segment(2) == null)  ) {
				
			}
			else {
				redirect('admin/Login');
			}
		}
   	}

	public function index()	{	
	    header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/settingsLogin");
	}

	public function Logout()
    {
        $this->session->sess_destroy();
        redirect('admin/Login/index');
	}
	
	public function settingsLoginCheck()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data = $this->input->post();
            if($data["username"] =="" || $data["password"] =="" || $data["type"] =="")
            {
                $data = array(
                    'title' => 'Error',
                    'heading' => 'Empty Details',
                    'message' => 'Please Fill the Fields'
                );
                $this->load->view("admin/login", $data);
            }
            else
            {                         
                $success = $this->LivinInteriorsModel->CheckLogin($data);
                $success_status = $success["status"];
                if($success_status)
                {
                    $this->session->set_userdata('user_username', $data['username']);
                    if($success["details"][0]["type"] == "A") {
                        $this->session->set_userdata('user_type_admin', 'true');
                        $this->session->set_userdata('user_type_settings', 'false');
                    }
                    else if($success["details"][0]["type"] == "S") {
                        $this->session->set_userdata('user_type_admin', 'true');
                        $this->session->set_userdata('user_type_settings', 'true');
                    }
                    redirect(base_url() . 'admin/Controlbase/Settings', $data);
                }
                else
                {
                    $data = array(
                        'title' => 'Error',
                        'heading' => 'Wrong Details',
                        'message' => 'OOPS Invalid Login'
                    );
                    $this->load->view("admin/settingsLogin", $data);
                }               
            }
        }
        else
        {
            $data = array(
                'title' => 'Error',
                'heading' => 'Empty Details',
                'message' => 'Please Fill the Fields'
            );
            $this->load->view("admin/settingsLogin",$data);
        }
    }
	// ***********************************************************[ SETTINGS CONTROLLER ]***********************************************************

	public function Settings()	{	
		if($this->session->userdata('user_type_admin') == "true" && $this->session->userdata('user_type_settings') == "true") 
		{
			header('Access-Control-Allow-Origin: *');		
			$this->load->view("admin/settings");
		}
		else {
			redirect('admin/Controlbase/Dashboard');
		}
	}
	
	public function getSettings() {
		header('Access-Control-Allow-Origin: *');
		$output = $this->LivinInteriorsModel->getSettingss();
		echo json_encode($output);
	}

	public function saveSettings()	{	
		header('Access-Control-Allow-Origin: *');	
		$data = $this->input->post();

		if($_FILES['projectLogo']['name'] == "")
        {
            $data["projectLogo"] = '';
        }
        else if($_FILES['projectLogo']['name'] != '')
        {
			$name = $_FILES['projectLogo']['name'];
			$name = str_replace(" ","_",$name);
            $file_path_doc = "uploads/logo/";
            $randomNumber = uniqid();        
            $file_path = $file_path_doc . $randomNumber . $name;
            $moved = move_uploaded_file($_FILES['projectLogo']['tmp_name'], $file_path);
            $data["projectLogo"] = base_url().$file_path; 
        }
		$output = $this->LivinInteriorsModel->saveSettingss($data);
		echo json_encode($output);
	}

	// ***********************************************************[ DASHBOARD CONTROLLER ]***********************************************************
	
	public function Dashboard()	{	
	    header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/dashboard");
	}

	// // ***********************************************************[ PRODUCT CONTROLLER ]***********************************************************
    // public function Product()   {   
    //     header('Access-Control-Allow-Origin: *');      
    //     $this->load->view("admin/product");
    // }

	// public function getProjects()
	// {
	// 	header('Access-Control-Allow-Origin: *');
	// 	$success=$this->LivinInteriorsModel->getProjectss();
	// 	echo json_encode($success);
	// }

	// public function getCategorylist()
	// {
	// 	header('Access-Control-Allow-Origin: *');
	// 	$data = $this->input->post();
	// 	$output = $this->LivinInteriorsModel->getCategorylistt($data);
	// 	echo json_encode($output);
	// }

	// public function InsertProjects()
	// {        
	// 	$data = $this->input->post();

	// 	$_FILES = $_FILES;
	// 	$count = count($_FILES['image']['name']);
	// 	for($i=0; $i<$count; $i++)
	// 	{
	// 		$imagename = $_FILES['image']['name'][$i];
	// 		$imgName = str_replace(' ', '_', $imagename);
	// 		if($imagename != ""){
	// 			$_FILES['image']['name']= time().$imgName;
	// 		}
	// 		else {
	// 			$_FILES['image']['name']= "null";
	// 		}
	// 		$_FILES['image']['type']= $_FILES['image']['type'][$i];
	// 		$_FILES['image']['tmp_name']= $_FILES['image']['tmp_name'][$i];
	// 		$_FILES['image']['error']= $_FILES['image']['error'][$i];
	// 		$_FILES['image']['size']= $_FILES['image']['size'][$i];
	// 		$config['upload_path'] = './uploads/products/';
	// 		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
	// 		$config['max_size'] = '2000000';
	// 		$config['remove_spaces'] = true;
	// 		$config['overwrite'] = false;
	// 		$config['max_width'] = '';
	// 		$config['max_height'] = '';
	// 		$this->load->library('upload', $config);
	// 		$this->upload->initialize($config);
	// 		if($this->upload->do_upload())
	// 		{
	// 			$fileName = $_FILES['image']['name'];
	// 			if($fileName != "null"){
	// 				$images[] = base_url() ."uploads/products/" .$fileName;
	// 			}
	// 			else{
	// 				$images[] ="null";				
	// 			}
	// 		}
	// 		else if(isset($fileName)){
	// 			$Warning = array(
	// 				'status' => 'warning',
	// 			   'warning' => $this->upload->display_errors()
	// 		   );
	// 		   echo json_encode($Warning);
	// 		}
	// 	}
	// 	if(isset($fileName))
	// 	{
	// 		$fileName = implode(',',$images);
	// 		$output = $this->LivinInteriorsModel->InsertProjectss($data, $fileName);
	// 		echo json_encode($output);
	// 	}
	// }

	// public function UpdateProjects()
	// {        
	// 	$data = $this->input->post();

	// 	$_FILES = $_FILES;
	// 	$count = count($_FILES['image']['name']);
	// 	for($i=0; $i<$count; $i++)
	// 	{
	// 		$imagename = $_FILES['image']['name'][$i];
	// 		$imgName = str_replace(' ', '_', $imagename);
	// 		if($imagename != ""){
	// 			$_FILES['image']['name']= time().$imgName;
				
	// 		}
	// 		else {
	// 			$_FILES['image']['name']= "null";
	// 		}
			
	// 		$_FILES['image']['type']= $_FILES['image']['type'][$i];
	// 		$_FILES['image']['tmp_name']= $_FILES['image']['tmp_name'][$i];
	// 		$_FILES['image']['error']= $_FILES['image']['error'][$i];
	// 		$_FILES['image']['size']= $_FILES['image']['size'][$i];
	// 		$config['upload_path'] = './uploads/products/';
	// 		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
	// 		$config['max_size'] = '2000000';
	// 		$config['remove_spaces'] = true;
	// 		$config['overwrite'] = false;
	// 		$config['max_width'] = '';
	// 		$config['max_height'] = '';
	// 		$this->load->library('upload', $config);
	// 		$this->upload->initialize($config);
	// 		if($this->upload->do_upload())
	// 		{
	// 			$fileName = $_FILES['image']['name'];
	// 			if($fileName != "null"){
	// 				$images[] = base_url() ."uploads/products/" .$fileName;
	// 			}
	// 			else{
	// 				$images[] ="null";				
	// 			}
	// 		}
	// 		else if(isset($fileName)){
	// 			$Warning = array(
	// 				'status' => 'warning',
	// 				'warning' => $this->upload->display_errors()
	// 			);
	// 			echo json_encode($Warning);
	// 		}
	// 	}
	// 	if(isset($fileName))
	// 	{
	// 		$fileNamess = implode(',',$images);
	// 		$output = $this->LivinInteriorsModel->UpdateProjectss($data, $fileNamess);
	// 		echo json_encode($output);
	// 	}
	// 	else{
	// 		$fileName = 'null';
	// 		$output = $this->LivinInteriorsModel->UpdateProjectss($data, $fileName);
	// 		echo json_encode($output);
	// 	}
	// }

	// public function DeleteProjects()
	// {
	// 	$data = $this->input->post();
	// 	$output = $this->LivinInteriorsModel->DeleteProjectss($data);
	// 	echo json_encode($output);
	// }

	// ***********************************************************[ ABOUT PAGE CONTROLLER ]***********************************************************
	public function About(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/about");
	}

	// ***********************************************************[ HOME PAGE BANNER CONTROLLER ]***********************************************************
	public function homePageBanner(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageBanner");
	}

	public function getHomePageBanner()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageBannerModel();
		echo json_encode($success);
	}

	public function updateHomePageBanner()
	{
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->updateHomePageBannerModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	// ***********************************************************[ HOME PAGE WHY SPACE FULL CONTROLLER ]***********************************************************
	public function homePageWhySpaceFill(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageWhySpaceFill");
	}
	
	public function getHomePageWhySpaceFill()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageWhySpaceFillModel();
		echo json_encode($success);
	}
	
	public function insertHomePageWhySpaceFill()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
	
		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	
		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}
	
			$success=$this->LivinInteriorsModel->insertHomePageWhySpaceFillModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}
	
	public function updateHomePageWhySpaceFill()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
	
		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
		
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePageWhySpaceFillModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePageWhySpaceFillModel($data);
			echo json_encode($success);
		}
		
	}
	
	public function deleteHomePageWhySpaceFill()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageWhySpaceFillModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE GUARANTEE CONTROLLER ]***********************************************************
	public function homePageGuarantee(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageGuarantee");
	}

	public function getHomePageGuarantee()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageGuaranteeModel();
		echo json_encode($success);
	}

	public function insertHomePageGuarantee()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$success=$this->LivinInteriorsModel->insertHomePageGuaranteeModel($data);
		echo json_encode($success);
	}

	public function updateHomePageGuarantee()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$success=$this->LivinInteriorsModel->updateHomePageGuaranteeModel($data);
		echo json_encode($success);
	}

	public function deleteHomePageGuarantee()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageGuaranteeModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE SAFTY MEASURES CONTROLLER ]***********************************************************
	public function Blog(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageSaftyMeasure");
	}

	public function getHomePageSaftyMeasure()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageSaftyMeasureModel();
		echo json_encode($success);
	}

	public function insertHomePageSaftyMeasure()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertHomePageSaftyMeasureModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateHomePageSaftyMeasure()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePageSaftyMeasureModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePageSaftyMeasureModel($data);
			echo json_encode($success);
		}
	}

	public function deleteHomePageSaftyMeasure()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageSaftyMeasureModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE VIDEO TESTIONIAL CONTROLLER ]***********************************************************
	public function homePageVideoTestimonial(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageVideoTestimonial");
	}

	public function getHomePageVideoTestimonial()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageVideoTestimonialModel();
		echo json_encode($success);
	}

	public function insertHomePageVideoTestimonial()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertHomePageVideoTestimonialModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateHomePageVideoTestimonial()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePageVideoTestimonialModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePageVideoTestimonialModel($data);
			echo json_encode($success);
		}	
	}

	public function deleteHomePageVideoTestimonial()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageVideoTestimonialModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE INTERIOR SOLUTIONS CONTROLLER ]***********************************************************
	public function homePageInteriorSolutions(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageInteriorSolutions");
	}

	public function getHomePageInteriorSolutions()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageInteriorSolutionsModel();
		echo json_encode($success);
	}

	public function insertHomePageInteriorSolutions()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertHomePageInteriorSolutionsModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateHomePageInteriorSolutions()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePageInteriorSolutionsModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePageInteriorSolutionsModel($data);
			echo json_encode($success);
		}
		
	}

	public function deleteHomePageInteriorSolutions()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageInteriorSolutionsModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE TEXT TESTIMONIAL CONTROLLER ]***********************************************************
	public function homePageTextTestimonial(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageTextTestimonial");
	}

	public function getHomePageTextTestimonial()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageTextTestimonialModel();
		echo json_encode($success);
	}

	public function insertHomePageTextTestimonial()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertHomePageTextTestimonialModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateHomePageTextTestimonial()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePageTextTestimonialModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePageTextTestimonialModel($data);
			echo json_encode($success);
		}
		
	}

	public function deleteHomePageTextTestimonial()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageTextTestimonialModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE NEWS CONTROLLER ]***********************************************************
	public function homePageNews(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePageNews");
	}

	public function getHomePageNews()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePageNewsModel();
		echo json_encode($success);
	}

	public function insertHomePageNews()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertHomePageNewsModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateHomePageNews()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePageNewsModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePageNewsModel($data);
			echo json_encode($success);
		}
		
	}

	public function deleteHomePageNews()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePageNewsModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE PARTNERS CONTROLLER ]***********************************************************
	public function homePagePartners(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/homePagePartners");
	}

	public function getHomePagePartners()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getHomePagePartnersModel();
		echo json_encode($success);
	}

	public function insertHomePagePartners()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertHomePagePartnersModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateHomePagePartners()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateHomePagePartnersModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateHomePagePartnersModel($data);
			echo json_encode($success);
		}
		
	}

	public function deleteHomePagePartners()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteHomePagePartnersModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ CATEGORY CONTROLLER ]***********************************************************
	public function category(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/category");
	}

	public function mainCategory(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/main_category");
	}
	
	public function getCategory()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getCategoryModel();
		echo json_encode($success);
	}

	public function getMainCategory()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getMainCategoryy();
		echo json_encode($success);
	}
	
	public function insertCategory()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
	
		$imagename = $_FILES['image']['name'];
		$_FILES['image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/homepage/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	
		if($this->upload->do_upload('image'))
		{
			$fileName = $_FILES['image']['name'];
			if($fileName != "null"){
				$data['image'] = base_url() ."uploads/homepage/" .$fileName;
			}
			else{
				$data['image'] ="null";				
			}
	
			$success=$this->LivinInteriorsModel->insertCategoryModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}
	
	public function updateCategory()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
	
		if($_FILES['image']['name'] != '')
		{
			$imagename = $_FILES['image']['name'];
			$_FILES['image']['name']= time().$imagename;
		
			$config['upload_path'] = './uploads/homepage/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('image'))
			{
				$fileName = $_FILES['image']['name'];
				if($fileName != "null"){
					$data['image'] = base_url() ."uploads/homepage/" .$fileName;
				}
				else{
					$data['image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateCategoryModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateCategoryModel($data);
			echo json_encode($success);
		}
		
	}

	public function insertMainCategory()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->LivinInteriorsModel->insertMainCategoryy($data);
		echo json_encode($success);
	}
	public function updateMainCategory()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->LivinInteriorsModel->updateMainCategoryy($data);
		echo json_encode($success);
	}
	
	public function deletecategory()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteCategoryModel($data);
		echo json_encode($output);
	}

	// ***********************************************************[ HOME PAGE FOOTER CONTROLLER ]***********************************************************
	public function Footer(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/footer");
	}

	public function getFooter()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getFooterModel();
		echo json_encode($success);
	}

	public function insertFooter()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$success=$this->LivinInteriorsModel->insertFooterModel($data);
		echo json_encode($success);
	}

	public function updateFooter()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$success=$this->LivinInteriorsModel->updateFooterModel($data);
		echo json_encode($success);
	}

	public function deleteFooter()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteFooterModel($data);
		echo json_encode($output);
	}
	
	// ***********************************************************[ PRODUCT CONTROLLER ]***********************************************************
	public function Product(){
		header('Access-Control-Allow-Origin: *');		
		$this->load->view("admin/Product");
	}

	public function getProduct()
	{
		header('Access-Control-Allow-Origin: *');
		$success=$this->LivinInteriorsModel->getProductModel();
		echo json_encode($success);
	}

	public function insertProduct()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		$imagename = $_FILES['product_image']['name'];
		$_FILES['product_image']['name']= time().$imagename;
		
		$config['upload_path'] = './uploads/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['max_size'] = '2000000';
		$config['remove_spaces'] = true;
		$config['overwrite'] = false;
		$config['max_width'] = '';
		$config['max_height'] = '';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('product_image'))
		{
			$fileName = $_FILES['product_image']['name'];
			if($fileName != "null"){
				$data['product_image'] = "uploads/product/".$fileName;
			}
			else{
				$data['product_image'] ="null";				
			}

			$success=$this->LivinInteriorsModel->insertProductModel($data);
			echo json_encode($success);
		}
		else{
			$Warning = array(
				'status' => 'warning',
				'warning' => $this->upload->display_errors()
			);
			echo json_encode($Warning);
		}
	}

	public function updateProduct()
	{        
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();

		if($_FILES['product_image']['name'] != '')
		{
			$imagename = $_FILES['product_image']['name'];
			$_FILES['product_image']['name']= time().$imagename;
			
			$config['upload_path'] = './uploads/product/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = '2000000';
			$config['remove_spaces'] = true;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
	
			if($this->upload->do_upload('product_image'))
			{
				$fileName = $_FILES['product_image']['name'];
				if($fileName != "null"){
					$data['product_image'] = "uploads/product/" .$fileName;
				}
				else{
					$data['product_image'] ="null";				
				}
	
				$success=$this->LivinInteriorsModel->updateProductModel($data);
				echo json_encode($success);
			}
			else{
				$Warning = array(
					'status' => 'warning',
					'warning' => $this->upload->display_errors()
				);
				echo json_encode($Warning);
			}
		}
		else
		{
			$success=$this->LivinInteriorsModel->updateProductModel($data);
			echo json_encode($success);
		}
		
	}

	public function deleteProduct()
	{
		$data = $this->input->post();
		$output = $this->LivinInteriorsModel->deleteProductModel($data);
		echo json_encode($output);
	}
}

?>



