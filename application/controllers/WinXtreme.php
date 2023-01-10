<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WinXtreme extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('WinXtremeModel'); 
		// if(!$this->session->userdata('user_id')){  
		//  	redirect('WinXtremeLogin/login'); 
		// } 
    }

    public function home()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("home"); 
	} 

	public function game()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("game"); 
	} 

	public function dashboard()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("dashboard"); 
	} 

    public function changepassword()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("changepassword"); 
	} 


    public function withdrawlogs()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("withdrawlogs"); 
	} 


    public function depositlogs()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("depositlogs"); 
	} 

	public function transactions()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("transactions"); 
	} 


	public function termsandcondition()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("termsandcondition"); 
	} 


	public function profile()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("profile"); 
	} 

	public function destroy()
	{	 
		$this->session->sess_destroy(); 
		redirect('WinXtremeLogin/login'); 
	} 

	public function otpverifysuccess()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("otpsuccess"); 
	} 
	
	public function otpverifyfailure()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("otpfailure"); 
	} 

	public function verifyalert()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("verifyalert"); 
	} 

	public function gamePage()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("game_page"); 
	} 

	public function getFinalResult(){
		return true;
	}


	/*public function index()
	{	
	    header('Access-Control-Allow-Origin: *');
		$total = $this->uri->total_segments();
		$id = $this->uri->segment($total);
		$data['product'] = $this->WinXtremeModel->categoryItem($id);
		$data['menu'] =  $this->WinXtremeModel->getCategory(); 
		// echo '<pre>';
		// print_r($data['menu']); exit();
		$this->load->view("about_us", $data);
	} 
	public function category()
	{	
	    header('Access-Control-Allow-Origin: *');
		$total = $this->uri->total_segments();
		$id = $this->uri->segment($total);
		$data['product'] = $this->WinXtremeModel->categoryItem($id);
		$data['menu'] =  $this->WinXtremeModel->getCategory(); 
		$this->load->view("category", $data);
	}
	public function getProduct(){
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$result =  $this->WinXtremeModel->getProductt($data);
		echo json_encode($result);
	}  
	public function Blog()
	{	
		if($this->session->userdata('user_name') == 'admin'){
		    header('Access-Control-Allow-Origin: *'); 
			$data['blog'] = $this->WinXtremeModel->getHomePageSaftyMeasureModel();
			$data['menu'] =  $this->WinXtremeModel->getCategory(); 
			$this->load->view("blog", $data); 
		}
		else{
			redirect('LivinInteriors/index');
		}
	}

	public function blogDetails()
	{		
		if($this->session->userdata('user_name') == 'admin'){
		    header('Access-Control-Allow-Origin: *');
			$total = $this->uri->total_segments();
			$id = $this->uri->segment($total);
			$data['blog'] = $this->WinXtremeModel->getHomePageSaftyMeasureModel();
			$data['details'] = $this->WinXtremeModel->blogDetails($id);
			$data['menu'] =  $this->WinXtremeModel->getCategory(); 
			$this->load->view("blog_details", $data);
		}
		else{
			redirect('LivinInteriors/index');
		}

	}

	public function aboutUs()
	{	
	    header('Access-Control-Allow-Origin: *');
		$total = $this->uri->total_segments();
		$id = $this->uri->segment($total);
		$data['product'] = $this->WinXtremeModel->getHomePageSaftyMeasureModel();
		$data['menu'] =  $this->WinXtremeModel->getCategory(); 
		$this->load->view("about_us", $data);
	}
	public function faq()
	{	
	    header('Access-Control-Allow-Origin: *');
		$total = $this->uri->total_segments();
		$id = $this->uri->segment($total);
		$data['product'] = $this->WinXtremeModel->categoryItem($id);
		$data['menu'] =  $this->WinXtremeModel->getCategory(); 
		$this->load->view("faq", $data);
	}
	public function sendmailfunction()
    {
		header('Access-Control-Allow-Origin: *');
		$data = $this->input->post();
		$success=$this->DataconcentrixModel->insertInquiry($data);
		if($success['result'] == 'success'){  
			$EmailAddress= 'manixdin73@gmail.com';
			$name = 'DataConcentrix';
			$subject="DataConcentrix Inquiry"; 
			require_once APPPATH.'third_party/PHPMailer/Exception.php';
			require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
			require_once APPPATH.'third_party/PHPMailer/SMTP.php';
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			// SMTP configuration
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			//$mail->SMTPDebug = 2;
			$mail->SMTPAuth = true;
			$mail->Username = 'usedfortestingg@gmail.com'; //your mail id
			$mail->Password = 'wthokqjkkghttyno'; // pass
			$mail->SMTPSecure = 'ssl';
			$mail->setFrom(''.$data["email"].'', ''.$data["name"].'');
			$mail->addAddress(''.$EmailAddress.'', ''.$name.'');
			// $mail->addReplyTo(''.$EmailAddress.'', ''.$name.'');
			// $mail->setFrom('karthik1732k@gmail.com', 'Karthik');
			// $mail->addReplyTo('karthik1732k@gmail.com', 'Karthik');
			//$mail->AddCC('support@kisanbandi.com', 'KisanBandi');
			$mail->Subject = $subject;
			$mail->isHTML(true);
			$mail->Body ='<table style="border-collapse: collapse;width: 100%;">
							<tr>
							<th style="border: 1px solid #DDDDDD;padding: 8px;text-align:left;">Name</th>
							<th style="border: 1px solid #DDDDDD;padding: 8px;text-align:left;">Email Address</th>
							<th style="border: 1px solid #DDDDDD;padding: 8px;text-align:left;">Phone Number</th>
							<th style="border: 1px solid #DDDDDD;padding: 8px;text-align:left;">Program Name</th>
							</tr>
							<tr>
							<td style="border: 1px solid #DDDDDD;padding: 8px;">'.$data["name"].'</td>
							<td style="border: 1px solid #DDDDDD;padding: 8px;">'.$data["email"].'</td>
							<td style="border: 1px solid #DDDDDD;padding: 8px;">'.$data["phone_number"].'</td>
							<td style="border: 1px solid #DDDDDD;padding: 8px;">'.$data["programme_id"].'</td>
							</tr>
						</table>';
			// $send_mail = $mail->send();
			if($mail->send()){
				$res["result"] = "success";
				echo json_encode($res);
			}
			else
			{
				return $mail->ErrorInfo;
			} 
		}
		else{
			$res["result"] = "fail";
			echo json_encode($res);
		}
	}*/
}
?>