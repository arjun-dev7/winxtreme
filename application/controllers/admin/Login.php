<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('LivinInteriorsModel');           
        if($this->session->userdata('user_username'))
        {
            redirect('admin/Controlbase/dashboard');
        }
        // print_r($this->session->userdata());
    }

    public function index()
    {
        $this->load->view('admin/login');
    }  

    public function LoginCheck()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data = $this->input->post();
            //small Logic
            if($data["username"] == "settings")
            {
                $data["type"] = "S";
            }
            else
            {
                $data["type"] = "A";
            }

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
                    else {
                        $this->session->set_userdata('user_type_admin', 'true');
                        $this->session->set_userdata('user_type_settings', 'true');
                    }
                    
                    redirect(base_url() . 'admin/Controlbase/Dashboard', $data);
                }
                else
                {
                    $data = array(
                        'title' => 'Error',
                        'heading' => 'Wrong Details',
                        'message' => 'OOPS Invalid Login'
                    );
                    $this->load->view("admin/login", $data);
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
            $this->load->view("admin/login",$data);
        }
    }

}