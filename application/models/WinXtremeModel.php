<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WinXtremeModel extends CI_Model {

	public function __construct()  
	{  
		 // Call the Model constructor  
		parent::__construct();  
		$this->load->database('default');
	}

	public function loginFunctionn($data){
		$user_data = $this->db->query("select * from tbl_user where email = '".$data['email']."' and password = '".$data['password']."' AND verified = '1' ")->result_array();
		if(sizeof($user_data) > 0){
			$result['status'] = 'success';
			$result['data'] = $user_data;
		}
		else{
			$result['status'] = 'failed';
		}
		return $result;
	}
	
	public function CheckLogin($data)  
	{  
		$this->db->where('username', $data["username"]);
		$this->db->where('password', $data["password"]);
		$this->db->where('type', $data["type"]);
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			$details = $query->result_array();
			$result['details'] = $details;
			$result['status'] = true;
		}
		else
		{
			$result['details'] = [];
			$result['status'] = false;
		}
		return $result;
	}


	public function registerr($data)  
	{   
		$email = $data['email'];
		$checkUser = $this->db->query("SELECT * FROM tbl_user WHERE email = '$email'")->result_array();
		if(sizeof($checkUser) > 0){
			$result['status'] = "failed";
			$result['statusCode'] = 401;
			$result['messge'] = "This email already used!!!";
			return $result;
		}
		else if($data['password'] != $data['cpassword']){
			$result['status'] = "failed";
			$result['statusCode'] = 401;
			$result['messge'] = "Password does not match!!!";
			return $result;
		}

		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$data['otp'] = substr(str_shuffle($permitted_chars), 0, 16); 
		unset($data['cpassword']);
		$this->db->insert('tbl_user', $data);
		if ($this->db->affected_rows() > 0)
		{
			$result['data'] = $data;
			$result['status'] = "success";
			$result['statusCode'] = 200;
			$result['messge'] = "user inserted successfully";
		}
		else
		{
			$result['status'] = "failed";
			$result['statusCode'] = 400;
			$result['messge'] = "user inserted failed";

		}
		return $result;
	}

	public function verifyMaill($data){
		$res = $this->db->query("SELECT * FROM `tbl_user` where  otp = '".$data['otp']."' ")->result_array();
		if(sizeof($res) > 0)
		{
			$this->db->query('UPDATE tbl_user SET verified = 1 where user_id = "'.$res[0]["user_id"].'"');
			if($this->db->affected_rows() == '1')
			{
				$result['user'] = $res[0];
				$result['status'] = "success";
				$result['message'] = "User verified";
				$result['statusCode'] = 200;
			}
		}
		else {
			$result['status'] = "failed";
			$result['message'] = "User verified failed";
			$result['statusCode'] = 400;
		}
		return $result;
	}


	public function getMainCategoryy(){
		return $this->db->query("select * from tbl_category where flag='1'")->result_array();
	} 	
	public function updateMainCategoryy($data){
		$this->db->where('category_id', $data['category_id']);
		$this->db->update('tbl_category', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Main category update successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Try again later!!!');
		}
		return $result;
	}
	public function insertMainCategoryy($data){
		$this->db->insert('tbl_category', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Main category insert successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Try again later!!!');
		}
		return $result;
	}
	public function successMessage($type, $data, $message)
	{
		if($type == 'get') {
			$result["status"] = "success";
			$result["statusCode"] = "200";
			$result["details"] = $data;
			$result["message"] = $message;
		}
		else {
			$result["status"] = "success";
			$result["statusCode"] = "200";
			$result["message"] = $message;
		}
		return $result;     
	}
	public function failureMessage($type, $data, $message)
	{
		if($type == 'get') {
			$result["status"] = "fail";
			$result["statusCode"] = "400";
			$result["details"] = $data;
			$result["message"] = $message;
		}
		else {
			$result["status"] = "fail";
			$result["statusCode"] = "400";
			$result["message"] = $message;
		}
		return $result;     
	}

	// ***********************************************************[ SETTINGS MODEL ]***********************************************************
	public function getSettingss()
	{        
		$sql = "select * from settings";
		$query = $this->db->query($sql);
		$getResult = $this->db->affected_rows();
		if($getResult == "0" || $getResult == 0) 
		{
			$result = $this->successMessage('get', '', 'No data found');
		}
		else if($getResult > 0 || $getResult > "0"){
			$details = $query->result_array();
			$result = $this->successMessage('get', $details, 'Data found');
		}
		else {
			$result = $this->failureMessage('get', '', 'something went wrong');
		}
		return $result;
	}
	
	public function saveSettingss($data)
	{       
		$sql = "select * from settings";
		$query = $this->db->query($sql);
		$getResult = $this->db->affected_rows();
		if($getResult == "0" || $getResult == 0) {
			$result = $this->saveSettings($data);
		}
		else {
			$result = $this->updateSettings($data);
		}
		return $result;
	}

	public function saveSettings($data) 
	{
		$projectName = $data["projectName"];
		$projectLogo = $data["projectLogo"];
		$colorCode = $data["colorCode"];
		$dashboard = $data["dashboard"];
		$about = $data["about"];
		$contact = $data["contact"];
		$services = $data["services"];
		$product = $data["product"];
		//product
		$project = $data["project"];
		$brand = $data["brands"];
		$solution = $data["solution"];
		$category = $data["category"];

		$gallery = $data["gallery"];
		$subGallery = $data["subGallery"];
		$banner = $data["banner"];
		$client = $data["client"];
		$testimonial = $data["testimonial"];

		$sql = "INSERT into settings (projectName, projectLogo, colorCode, dashboard, about, contact, project, services, product, gallery, subGallery,
		banner, client, testimonial, brands) values ('$projectName', '$projectLogo', '$colorCode', $dashboard, $about, $contact, $project, $services, $product, $gallery, $subGallery,
		'$banner', '$client', '$testimonial', $brand)";
		$query = $this->db->query($sql);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('save', '', 'Settings details added successfully');
		}
		else
		{
			$result = $this->failureMessage('save', '', 'Error in adding settings details');
		}
		return $result;
	}
	
	public function updateSettings($data) 
	{
		$projectName = $data["projectName"];
		$projectLogo = $data["projectLogo"];
		$colorCode = $data["colorCode"];
		$dashboard = $data["dashboard"];
		$about = $data["about"];
		$contact = $data["contact"];
		//product
		$project = $data["project"];
		$solution = $data["solution"];
		$category = $data["category"];
		$brand = $data["brands"];	

		$services = $data["services"];
		$product = $data["product"];
		$gallery = $data["gallery"];
		$subGallery = $data["subGallery"];
		$banner = $data["banner"];
		$client = $data["client"];
		$testimonial = $data["testimonial"];

		if($projectLogo == "") {
			$sql = "update settings set projectName = '$projectName', dashboard = $dashboard, colorCode = '$colorCode', 
										about = $about, contact = $contact, project = $project, solution = $solution, category = $category, services = $services,
										product = $product, gallery = $gallery, subGallery = $subGallery,
										banner = $banner, client = $client, testimonial = $testimonial,  brands = $brand";
		}
		else {
			$sql = "update settings set projectName = '$projectName', projectLogo = '$projectLogo', dashboard = $dashboard, colorCode = '$colorCode', 
									about = $about, contact = $contact, project = $project, services = $services,
									product = $product, gallery = $gallery, subGallery = $subGallery,
									banner = $banner, client = $client, testimonial = $testimonial, brands = $brand";
		}
		
		$query = $this->db->query($sql);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('update', '', 'Settings details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('update', '', 'Error in updating settings details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE BANNER MODEL ]***********************************************************
	public function getHomePageBannerModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-banner');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageBannerModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page banner details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page banner details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE WHY SPACE FILL MODEL ]***********************************************************
	public function getHomePageWhySpaceFillModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-whyspacefill');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageWhySpaceFillModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Why Space Fill details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Why Space Fill details');
		}
		return $result;
	}

	public function insertHomePageWhySpaceFillModel($data){
		$data['module'] = 'home-page-whyspacefill';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Why Space Fill details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Why Space Fill details');
		}
		return $result;
	}

	public function deleteHomePageWhySpaceFillModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Why Space Fill details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Why Space Fill details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE GUARANTEE MODEL ]***********************************************************
	public function getHomePageGuaranteeModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-guarantee');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageGuaranteeModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Guarantee details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Guarantee details');
		}
		return $result;
	}

	public function insertHomePageGuaranteeModel($data){
		$data['module'] = 'home-page-guarantee';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Guarantee details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Guarantee details');
		}
		return $result;
	}

	public function deleteHomePageGuaranteeModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Guarantee details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Guarantee details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE SAFTY MEASURES MODEL ]***********************************************************
	public function getHomePageSaftyMeasureModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-saftymeasures');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array(); 
		return $result;
	}

	public function blogDetails($id){ 
		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-saftymeasures');
		$this->db->where('content_id',$id);
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array(); 
		return $result;
	}

	public function updateHomePageSaftyMeasureModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Safty Measure details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Safty Measure details');
		}
		return $result;
	}

	public function insertHomePageSaftyMeasureModel($data){
		$data['module'] = 'home-page-saftymeasures';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Safty Measure details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Safty Measure details');
		}
		return $result;
	}

	public function deleteHomePageSaftyMeasureModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Safty Measure details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Safty Measure details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE VIDEO TESTIMONIAL MODEL ]***********************************************************
	public function getHomePageVideoTestimonialModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-videotestimonial');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageVideoTestimonialModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Video Testimonial details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Video Testimonial details');
		}
		return $result;
	}

	public function insertHomePageVideoTestimonialModel($data){
		$data['module'] = 'home-page-videotestimonial';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Video Testimonial details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Video Testimonial details');
		}
		return $result;
	}

	public function deleteHomePageVideoTestimonialModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Video Testimonial details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Video Testimonial details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE INTERIOR SOLUTIONS MODEL ]***********************************************************
	public function getHomePageInteriorSolutionsModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-interiorsolutions');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageInteriorSolutionsModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Interior Solutions details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Interior Solutions details');
		}
		return $result;
	}

	public function insertHomePageInteriorSolutionsModel($data){
		$data['module'] = 'home-page-interiorsolutions';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Interior Solutions details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Interior Solutions details');
		}
		return $result;
	}

	public function deleteHomePageInteriorSolutionsModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Interior Solutions details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Interior Solutions details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE TEXT TESTIMONIAL MODEL ]***********************************************************
	public function getHomePageTextTestimonialModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-texttestimonial');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageTextTestimonialModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Test Testimonial details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Test Testimonial details');
		}
		return $result;
	}

	public function insertHomePageTextTestimonialModel($data){
		$data['module'] = 'home-page-texttestimonial';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Test Testimonial details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Test Testimonial details');
		}
		return $result;
	}

	public function deleteHomePageTextTestimonialModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Test Testimonial details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Test Testimonial details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE NEWS MODEL ]***********************************************************
	public function getHomePageNewsModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-news');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePageNewsModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page NEWS details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page NEWS details');
		}
		return $result;
	}

	public function insertHomePageNewsModel($data){
		$data['module'] = 'home-page-news';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page NEWS details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page NEWS details');
		}
		return $result;
	}

	public function deleteHomePageNewsModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page NEWS details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page NEWS details');
		}
		return $result;
	}

	// ***********************************************************[ HOME PAGE PARTNERS MODEL ]***********************************************************
	public function getHomePagePartnersModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','home-page-partner');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateHomePagePartnersModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Partners details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Partners details');
		}
		return $result;
	}

	public function insertHomePagePartnersModel($data){
		$data['module'] = 'home-page-partner';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Partners details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Partners details');
		}
		return $result;
	}

	public function deleteHomePagePartnersModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Partners details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Partners details');
		}
		return $result;
	}

	// ***********************************************************[ CATAGARY MODEL ]***********************************************************
	public function getCategoryModel(){

		// $this->db->select('*');
		// $this->db->from('tbl_main_category');
		// $this->db->where('flag','1');
		$result = $this->db->query("select a.*, b.category_name from tbl_main_category a inner join tbl_category b on a.category_id = b.category_id where a.flag = 1")->result_array();
		return $result;
	}

	public function updateCategoryModel($data){
		$this->db->where('main_category_id', $data['main_category_id']);
		$this->db->update('tbl_main_category', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Why Space Fill details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Why Space Fill details');
		}
		return $result;
	}

	public function insertCategoryModel($data){
		$this->db->insert('tbl_main_category', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Why Space Fill details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Why Space Fill details');
		}
		return $result;
	}

	public function deleteCategoryModel($data){

		$this->db->where('main_category_id', $data['main_category_id']);
		$this->db->update('tbl_main_category', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Why Space Fill details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Why Space Fill details');
		}
		return $result;
	}

	// ===========================================================================[ Mani ]========================================================
	public function getCategory(){  
		$main = $this->db->query("select * from tbl_category where flag=1")->result_array(); 
		for($i=0; $i < sizeof($main); $i++){ 
			$sub = $this->db->query("select main_category_id,name from tbl_main_category where flag=1 and category_id = '".$main[$i]['category_id']."' ")->result_array(); 
			$main[$i]['sub'] = $sub;
		}
		return $main;
	}

	public function categoryItem($id){ 
		$result['banner'] = $this->db->query("SELECT * FROM tbl_main_category where main_category_id = '$id'")->result_array(); 
		$result['product'] = $this->db->query("SELECT * FROM tbl_product where main_category_id = '$id'")->result_array(); 
		$result['shape'] = array(); 
		return $result;
	}

	public function getProductt($data){ 
		$id = $data['id'];
		$result['product'] = $this->db->query("SELECT * FROM tbl_product where product_id = '$id'")->result_array();  

		$main_category_id = $result['product'][0]['main_category_id'];
		$result['related'] = $this->db->query("SELECT * FROM tbl_product where main_category_id = '$main_category_id' limit 3")->result_array(); 

		$next_product = $this->db->query("SELECT product_id FROM tbl_product where main_category_id = '$main_category_id' and product_id > '$id' limit 1")->result_array(); 
		$prev_product = $this->db->query("SELECT product_id FROM tbl_product where main_category_id = '$main_category_id' and product_id < '$id' limit 1")->result_array(); 

		if(sizeof($next_product) == 0 ){
			$next_product = $this->db->query("SELECT product_id FROM tbl_product where  main_category_id = '$main_category_id' order by product_id asc limit 1")->result_array(); 
		}
		if(sizeof($prev_product) == 0 ){
			$prev_product = $this->db->query("SELECT product_id FROM tbl_product where  main_category_id = '$main_category_id' order by product_id desc limit 1")->result_array(); 
		}
		$result['next_product'] = $next_product[0]['product_id'];
		$result['prev_product'] = $prev_product[0]['product_id'];
		return $result;
	}

	public function getTrendingProduct(){ 
		return $this->db->query("SELECT * FROM tbl_product where trending_flag = 1")->result_array(); 
	}

	public function getBestSellingProduct(){ 
		$result['category'] = $this->db->query("SELECT * FROM tbl_main_category where homeflag = 1 ")->result_array();
		for ($i=0; $i < sizeof($result['category']); $i++) { 
			$main_category_id = $result['category'][$i]['main_category_id'];
			$result['category'][$i]['product'] = $this->db->query("SELECT * FROM tbl_product where main_category_id = '$main_category_id'")->result_array(); 
		} 
		return $result;
	}

	// ***********************************************************[ HOME PAGE FOOTER MODEL ]***********************************************************
	public function getFooterModel(){

		$this->db->select('*');
		$this->db->from('tbl_content');
		$this->db->where('module','footer');
		$this->db->where('flag','1');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function updateFooterModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Footer details updated successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in updating Home page Footer details');
		}
		return $result;
	}

	public function insertFooterModel($data){
		$data['module'] = 'footer';
		$this->db->insert('tbl_content', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Footer details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Footer details');
		}
		return $result;
	}

	public function deleteFooterModel($data){

		$this->db->where('content_id', $data['content_id']);
		$this->db->update('tbl_content', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Footer details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Footer details');
		}
		return $result;
	}

	// ***********************************************************[ PRODUCT MODEL ]***********************************************************
	public function getProductModel()
	{
		return $this->db->query("SELECT a.*, b.name as category_name FROM tbl_product as a 
			inner join tbl_main_category as b on a.main_category_id = b.main_category_id 
			where a.flag =1 and b.flag =1")->result_array();
	}

	public function updateProductModel($data){  
		$this->db->where('product_id', $data['product_id']);
		$this->db->update('tbl_product', $data); 
		$result = $this->successMessage('Save', '', 'Home page Interior Solutions details updated successfully');
		return $result;
	}

	public function insertProductModel($data){  
		$this->db->insert('tbl_product', $data);
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Interior Solutions details added successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in adding Home page Interior Solutions details');
		}
		return $result;
	}

	public function deleteProductModel($data){

		$this->db->where('product_id', $data['product_id']);
		$this->db->update('tbl_product', array( "flag" => 0 ));
		if ($this->db->affected_rows() == '1')
		{
			$result = $this->successMessage('Save', '', 'Home page Interior Solutions details deleted successfully');
		}
		else
		{
			$result = $this->failureMessage('Error', '', 'Error in deleting Home page Interior Solutions details');
		}
		return $result;
	}
}

