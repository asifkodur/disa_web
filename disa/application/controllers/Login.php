<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
   class Login extends CI_Controller { 
	   
	   public function __construct()
        {
                parent::__construct();
                $this->load->library("session");   
                 
                
                $this->load->model('database_operations');
                
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');
               
                             
                
                
                
        }
	
      public function index() { 
		  
		  
		  
                if($this->session->userdata('logged_in')) // Redirects to admin panel if already logged in
				{redirect("dashboard");
					}
		 
		  $this->load_main_page();
         
      } 
      
      public function load_main_page(){
		  
		  //Loads the Login Page
		  
		  $data['page']="login";
      
			$data['title'] = 'Login';
			if($this->session->userdata('logged_in')){
				$data['logged_in']=TRUE;
				$data['user_type']=$this->session->userdata('user_type');
				$data['username']=$this->session->userdata('username');
			}
			else
			{
				$data['logged_in']=FALSE;
				$data['user_type']='';
				}
			
			$content_header=$this->load->view('headers/header',$data,TRUE); 
			
			
			$content_nav_menu=$this->load->view('menu/nav_menu',$data,TRUE);
			$content_body=$this->load->view('login/login_view',$data,TRUE); 
			
		
			$data['content_header']=$content_header;
			
			$data['content_nav_menu']=$content_nav_menu;
			$data['content_body']=$content_body;
			
		 
		 
         $this->load->view('layouts/main',$data); 
          
         
        
         
	  }
	  
	 
	  
	  public function form_submitted()
	  { //Called when user submits form
		  
		  $username=$this->input->post('username', TRUE); //TRUE for xss clean
			$password=$this->input->post('password', TRUE);
		  
			$check_result=$this->database_operations->login_check($username,$password); //returns user_type on success else false
			if($check_result)// if login success
			{
		  
		 $data = array(
                    'username' => $username,
                    'user_type'=> $check_result,
                    'logged_in' => TRUE
                    );
            $this->session->set_userdata($data);
				
            redirect('dashboard');
		  }
		  else{ 
			  //echo "error";
			  $this->session->set_flashdata('error', 'Wrong username-password combination'); 
			  
  }
  $this->load_main_page();
}
  
  public function logout()
  {
  $this->session->unset_userdata('username');
$this->session->unset_userdata('logged_in');
$this->session->unset_userdata('user_type');

$this->session->sess_destroy();
redirect('register');
}
}
	  
