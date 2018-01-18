<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
   class Dashboard extends CI_Controller { 
	   
	   
	   // Constructor
	   public function __construct()
        {
                parent::__construct();
                $this->load->model('database_operations');
                $this->load->helper('url');
                $this->load->helper('form');
                
                 $this->load->library("session");
                 
                 $this->redirect_if_not_logged_in() ; //  Member function ,Redirects if not logged in
                 
                 
                
                
                
                
                
        }
        
      
	public function redirect_if_not_logged_in()
	{
		 if ( ! $this->session->userdata('logged_in'))
    { 
        // List in this array methods in this class allowed without logging in  
        $allowed = array();
            
       
        if ( ! in_array($this->router->fetch_method(), $allowed))
        {
            redirect('login');
        }
    }
		}
      public function index() { 		  
		  
		  
		  $data['title']="C Panlel";
		  $data['page']='dashboard';
		  if($this->session->userdata('logged_in')){
				$data['logged_in']=TRUE;
				$data['user_type']=$this->session->userdata('user_type');
				$data['username']=$this->session->userdata('username');
			}
			else
			{
				$data['logged_in']=FALSE;
				$data['user_type']='';}
		  
		  
         $content_header=$this->load->view('headers/header',$data,TRUE); 
         
         $content_nav_menu=$this->load->view('menu/nav_menu',$data,TRUE); 
         $content_body=$this->load->view('dashboard/dashboard_view',$data,TRUE); 
         
         
			$data['content_header']=$content_header;
			$data['content_nav_menu']=$content_nav_menu;
			$data['content_body']=$content_body;
			
		 
		 
         $this->load->view('layouts/main',$data); 
         
      } 
      
      
}
