<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SapaceFillModel extends CI_Model {

	public function __construct()  
	{   
		parent::__construct();  
		$this->load->database('default');
	}

	public function getCategory(){ 
		return $this->db->query("SELECT * FROM tbl_main_category")->result_array();
	}

	public function categoryItem($id){ 
		$result['banner'] = $this->db->query("SELECT * FROM tbl_main_category where main_category_id = '$id'")->result_array(); 
		$result['product'] = $this->db->query("SELECT * FROM tbl_product where main_category_id = '$id'")->result_array(); 
		$result['shape'] = $this->db->query("SELECT DISTINCT(shape) FROM tbl_product where shape IS NOT NULL and main_category_id = '$id'")->result_array(); 
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



  
}

