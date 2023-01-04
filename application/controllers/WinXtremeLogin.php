<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WinXtremeLogin extends CI_Controller {
 

    function __construct() {
        parent::__construct();
        // $this->session->destroy();
        $this->load->helper('url');
		$this->load->model('WinXtremeModel');
		if($this->session->userdata('user_id')){
		 	redirect('WinXtreme/home');
		}
    }

	public function index()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("index"); 
	} 

	public function login()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("login"); 
	} 

	public function forgotpassword()
	{	
	    header('Access-Control-Allow-Origin: *'); 
		$this->load->view("forgotpassword"); 
	} 

	public function resendmail(){

	}
	
	// public function destroy()
	// {	 
	// 	$this->session->sess_destroy(); 
	// 	redirect('WinXtremeLogin/login'); 
	// }




	public function about()
	{	
	 //    header('Access-Control-Allow-Origin: *');
		// $this->load->view("index");
		// echo 'this is about';
	} 

	public function loginFunction()
	{	
	    $data = $this->input->post();
	    // print_r($data); exit;
	    $success = $this->WinXtremeModel->loginFunctionn($data);
	    if($success['status'] == "success"){
	    	$user = $success['data'][0];
	    	$this->session->set_userdata('user_id', $user['user_id']);
	    	$this->session->set_userdata('user_name', $user['username']);
		 	redirect('WinXtreme/home');
	    }
	    else{
		 	redirect('WinXtremeLogin/login');
	    }
	} 

	public function register() {
	    $data = $this->input->post();
	    $success = $this->WinXtremeModel->registerr($data); 
	    if($success['statusCode'] == 200){
	    	$data = $success['data'];
	    	$this->sendMail($data);
	    }
	    else if($success['statusCode'] == 401){
	    	$this->session->set_flashdata('email_valid', $success['messge']);
		 	redirect('WinXtremeLogin/index');
	    } 
	    else{
		 	redirect('WinXtremeLogin/login');
	    }
	    echo json_encode($success); 
	}

	public function sendMail($data)
	{
		header('Access-Control-Allow-Origin: *');
		$name = 'WinXtreme';
		$subject="WinXtreme Email Verification"; 
		require_once APPPATH.'third_party/PHPMailer/Exception.php';
		require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
		require_once APPPATH.'third_party/PHPMailer/SMTP.php';
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->Username = 'usedfortestingg@gmail.com'; //your mail id
		$mail->Password = 'wthokqjkkghttyno'; // pass
		$mail->SMTPSecure = 'tls';
		$mail->setFrom('winxtreme@gmail.com', 'WinXtreme');
		$mail->addAddress($data['email'], $data['username']);
		$mail->Subject = $subject;
		$mail->isHTML(true);

		$details = 'http://localhost/projects/winxtreme/WinXtremeLogin/verifyMail/'.uniqid().'/'.$data['otp']; 

		// echo $details; exit;
		$email_message = "Your email verification link here. Please click <a href='$details'>here</a>"; 
		$mail->Body = $email_message;

		if($mail->send()){
	    	$this->session->set_userdata('user_id', $data['user_id']);
	    	$this->session->set_userdata('user_name', $data['username']);
	    	$this->session->set_userdata('verified',0);
		 	redirect('WinXtreme/verifyalert');
		}
		else
		{
			 print_r($mail->ErrorInfo); exit;
		 	// redirect('WinXtremeLogin/login');
		}
	}

	public function testmail()
	{
		header('Access-Control-Allow-Origin: *');
		$name = 'WinXtreme';
		$subject="WinXtreme Email Verification"; 
		require_once APPPATH.'third_party/PHPMailer/Exception.php';
		require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
		require_once APPPATH.'third_party/PHPMailer/SMTP.php';
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPDebug = 2;
		$mail->SMTPAuth = true;
		$mail->Username = 'usedfortestingg@gmail.com'; //your mail id
		$mail->Password = 'wthokqjkkghttyno'; // pass
		$mail->SMTPSecure = 'ssl';
		$mail->setFrom('winxtreme@gmail.com', 'WinXtreme');
		$mail->addAddress('arjun.14aj@gmail.com', 'ayyappan');
		$mail->Subject = $subject;
		$mail->isHTML(true);
		// $mail->Body ='Your email verification link here. Please click <a href="http://localhost/projects/winxtreme/WinXtremeLogin/verifyMail/"'.md5($data['email']).'"/"'.uniqid().'"/"'.md5($data['otp']).'">here</a>';

		echo $this->XtremeEncrpt('arjun.14aj@gmail.com');
		exit;

		$details = 'http://localhost/projects/winxtreme/WinXtremeLogin/verifyMail/'.$this->XtremeEncrpt('arjun.14aj@gmail.com').'/'.uniqid().'/'.$this->XtremeEncrpt('135790'); 

		// echo $details; exit;
		$email_message = "Your email verification link here. Please click <a href='$details'>here</a>"; 

		$mail->Body =$email_message;

		if($mail->send()){
			$res["result"] = "success";
			echo json_encode($res);
		}
		else
		{
			return $mail->ErrorInfo;
		}
	}

	public function verifyMail(){
		$total_segments = $this->uri->total_segments();
		$data['otp'] = $this->uri->segment($total_segments); 
		$output = $this->WinXtremeModel->verifyMaill($data); 
		// print_r($output); exit;
		if($output['status'] == "success")
		{
	    	$this->session->set_userdata('user_id', $output['user']['user_id']);
	    	$this->session->set_userdata('user_name', $output['user']['username']);
	    	$this->session->set_userdata('verified',1);
		 	redirect('WinXtreme/otpverifysuccess');
		}
		else {
		 	redirect('WinXtreme/otpverifyfailure');
		}
	}

	public function XtremeEncrpt($string){   

		$ciphering = "AES-128-CTR"; 
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0; 
		$encryption_iv = '7539148637919532'; 
		$encryption_key = "winxtreme";  
		$encryption = openssl_encrypt( base64_encode($string) , $ciphering, $encryption_key, $options, $encryption_iv); 
		return str_replace('==','',$encryption);
		// return ;
	}

	public function XtremeDecrpt($encryption){     
		$decryption_iv = '7539148637919532'; 
		$options = 0; 
		$ciphering = "AES-128-CTR"; 
		$decryption_key = "winxtreme"; 
		$decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);  
		return $decryption;  
	}

	 
}
?>