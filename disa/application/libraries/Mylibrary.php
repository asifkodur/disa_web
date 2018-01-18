<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylibrary {
	
	protected $CI;
	public function __construct()
	{
		//parent::__consruct();
				
				
				$this->CI =& get_instance();
		
				$this->CI->load->library("session");   
                $this->CI->load->model('database_operations');
                $this->CI->load->helper('url');
                $this->CI->load->helper('form');
                
                }

        public function load_page($page)
        // Load views based on the $page argument
        
        
        {	
			
			if( $this->CI->session->userdata('logged_in')) // Collects log in info to be passed as $data to views
			{
				$data['logged_in']=$this->CI->session->userdata('logged_in');
				$data['user_type']=$this->CI->session->userdata('user_type');
				$data['username']=$this->CI->session->userdata('username');
			}
			else
			{	
				$data['logged_in']=FALSE;
				$data['user_type']='';
				}
			
			
			
			
			switch ($page){
				case "home": //if 'home' page is requested
				break;
				case "register_student": //if register_student page is requested
						$data['page'] = "register";
						$data['title'] = 'Register';
						 $content_body = $this->CI->load->view('register/register_view', $data, TRUE);
						 $this->reload_if_first();
                        
                        
				break;
				case "login":
						
						if($this->CI->session->userdata('logged_in')) // Redirects to admin panel if already logged in
						{redirect('dashboard');}
				
						$data['page']="login";      
						$data['title'] = 'Login';
						$content_body=$this->CI->load->view('login/login_view',$data,TRUE); 
				break;
				case "dashboard":
						$this->redirect_if_not_logged_in();
						$data['title']="C Panlel";
						$data['page']='dashboard';
						$content_body=$this->CI->load->view('dashboard/dashboard_view',$data,TRUE); 
				break;
				case "student_list":
						$this->redirect_if_not_logged_in();
				
						 $data['title'] = "Student List";
						$data['page'] = 'student_list';
						$data['student_list'] = $this->CI->database_operations->get_student_list();                      
                        
						$content_body = $this->CI->load->view('student_list/student_list_view', $data, TRUE);
                        
                        
               
                        
                        
				break;
				case "about":
				break;
				case "contact":
				break ;
				default:
					echo  "error page not found";
					
				}
				$content_header=$this->CI->load->view('headers/header',$data,TRUE); 
				$content_nav_menu=$this->CI->load->view('menu/nav_menu',$data,TRUE);
				$content_flash_msg = $this->CI->load->view('layouts/flash_msg', '', TRUE);
				
				$data['content_header'] = $content_header;
                $data['content_flash_msg'] = $content_flash_msg;
                $data['content_nav_menu'] = $content_nav_menu;
                $data['content_body'] = $content_body;

                $this ->CI->load->view('layouts/main', $data);
                       
                        
			
			
			
                        
                        
				
        }
        //converts date to dd/mm/yyyy
        function convert_date_to_ddmmyyyy($date)
            {
                $date = explode('-', $date);
                $day = $date[0];
                $month = $date[1];
                $year = $date[2];
                $new_date = $year . "/" . $month . "/" . $day;
                return $new_date;
            }
            
            // Converts user input date to mysql compatible yyyy/mm/dd
        function convert_date_to_yyyymmdd($date)
            {
                $date = explode('/', $date);
                $day = $date[0];
                $month = $date[1];
                $year = $date[2];
                $new_date = $year . "-" . $month . "-" . $day;
                return $new_date;
            }
            
            public function logout()
  {
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('logged_in');
			$this->CI->session->unset_userdata('user_type');

			$this->CI->session->sess_destroy();
			
}

public function login_check()
{
		//Authenticates user credentials and returns TRUE/FLASE and sets session cookies
		$username=$this->CI->input->post('username', TRUE); //TRUE for xss clean
			$password=$this->CI->input->post('password', TRUE);
		  
			$check_result=$this->CI->database_operations->login_check($username,$password); //returns user_type on success else false
			if($check_result)// if login success
			{
		  
		 $data = array(
                    'username' => $username,
                    'user_type'=> $check_result,
                    'logged_in' => TRUE
                    );
            $this->CI->session->set_userdata($data);
				
            return TRUE;
		  }
		  else{ 
			  //echo "error";
			  $this->CI->session->set_flashdata('error', 'Wrong username-password combination'); 
			  return FALSE;
			  
  }}
  public function redirect_if_not_logged_in()
  // used for pages that require login
	{
		 if ( ! $this->CI->session->userdata('logged_in'))
    { 
        // List in this array methods in this class allowed without logging in  
        $allowed = array();
            
       
        if ( ! in_array($this->CI->router->fetch_method(), $allowed))
        {
            redirect('login');
        }
    }
		}
		public function delete_student($id = '', $email = '')

            { // check if root user(previlleged) to delete
                if ($this->CI
                        ->session
                        ->userdata('user_type') != 'root')
                    {
                        redirect('student_list');
                    }

                if ($id != '' and $email != '')
                    {
                        $id = strip_tags(trim($id));
                        $email = strip_tags(trim(urldecode($email)));

                        if ($this->CI
                                ->database_operations
                                ->delete_student(array(
                                'student_id' => $id,
                                'email' => $email
                        ))) // gets TRUE on successful delettion
                        
                            {

                                $this->CI
                                        ->session
                                        ->set_flashdata('success', 'Successfully Deleted Data');
                            } // flash data is displayed in view/register/header.php
                        else
                            {
                                $this->CI
                                        ->session
                                        ->set_flashdata('error', 'Something went wrong. Could not Delete');
                            } // flash data is displayed in view/register/header.php}
                        

                        
                    }
                else
                    {
                        $this->CI
                                ->session
                                ->set_flashdata('error', 'Something went wrong. Could not Delete');
                    }
                

            }
            public function get_user_agent()
            
            
            { //collects user agent info(requierd for identifying chrome browser android
				$this->CI->load->library('user_agent');
                $agent = '';
                if ($this->CI
                        ->agent
                        ->is_browser())
                    {
                        $agent = $agent . $this->CI
                                ->agent
                                ->browser() . ' ' . $this->CI
                                ->agent
                                ->version();
                    }
                if ($this->CI
                        ->agent
                        ->is_robot())
                    {
                        $agent = $agent . $this->CI
                                ->agent
                                ->robot();
                    }
                if ($this->CI
                        ->agent
                        ->is_mobile())
                    {
                        $agent = $agent . $this->CI
                                ->agent
                                ->mobile();
                    }
                return $agent;
            }
            
            public function validate_registration_form()
            
            {
                # Validattion rules form inputs in addition to HTML5 validation on client side
                $this->CI->load->library('form_validation');
                
                $this->CI
                        ->form_validation
                        ->set_rules('name', 'Name', 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('u_email', 'Email', 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('dob', "Date of Birth", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('father', "Father's Name", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('mother', "Mother's Name", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('address1', "Address1", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('address2', "Address2", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('phone', "Phone", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('course', "Course", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('course_details', "Course Deatils", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('duration_year', "Course Duration Year", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('duration_month', "Course Duration Month", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('finance', "Financial Status", 'required');
                $this->CI
                        ->form_validation
                        ->set_rules('if_working', "Are you working", 'required');
                return $this->CI
                        ->form_validation
                        ->run();
            }
            
            public function registration_form_submitted()
            {	// called when student_register form/function is submitted
				if ($this->validate_registration_form() == FALSE)
                    {
                        $this->CI
                                ->session
                                ->set_flashdata('error', 'Data entered could not be validated');
                    }
                else
                    {
                        //The name of array elements is the same name in dtabase fields
                        $list = array(
                                'name' => $this->CI
                                        ->input
                                        ->post('name', TRUE) , //TRUE for xss clean
                                'gender' => $this->CI
                                        ->input
                                        ->post('gender', TRUE) ,
                                'dob' => $this->convert_date_to_yyyymmdd($this->CI
                                        ->input
                                        ->post('dob', TRUE)) , // function converts date to mysqlcompatible format
                                'email' => $this->CI
                                        ->input
                                        ->post('u_email', TRUE) ,
                                'father' => $this->CI
                                        ->input
                                        ->post('father', TRUE) ,
                                'mother' => $this->CI
                                        ->input
                                        ->post('mother', TRUE) ,
                                'address1' => $this->CI
                                        ->input
                                        ->post('address1', TRUE) ,
                                'address2' => $this->CI
                                        ->input
                                        ->post('address2', TRUE) ,
                                'phone' => $this->CI
                                        ->input
                                        ->post('phone', TRUE) ,
                                'course_name' => $this->CI
                                        ->input
                                        ->post('course', TRUE) ,
                                'course_details' => $this->CI
                                        ->input
                                        ->post('course_details', TRUE) ,
                                'institution' => $this->CI
                                        ->input
                                        ->post('institution', TRUE) ,
                                'course_duration_year' => $this->CI
                                        ->input
                                        ->post('duration_year', TRUE) ,
                                'course_duration_month' => $this->CI
                                        ->input
                                        ->post('duration_month', TRUE) ,
                                'financial_status' => $this->CI
                                        ->input
                                        ->post('finance', TRUE) ,
                                'if_working' => $this->CI
                                        ->input
                                        ->post('if_working', TRUE) ,
                                'working_details' => $this->CI
                                        ->input
                                        ->post('working_type', TRUE) ,
                                'interest' => $this->CI
                                        ->input
                                        ->post('interests', TRUE) ,
                                'career_aspiration' => $this->CI
                                        ->input
                                        ->post('aspiration', TRUE)
                        );
                        if ($this->CI
                                ->database_operations
                                ->insert_student($list)) // if operation success returns TRUE
                        
                            {
                                //$this->send_mail();
                                $this->CI
                                        ->session
                                        ->set_flashdata('success', 'Successfully Saved Data');
                            } // flash data is displayed in view/register/header.php
                        else
                            {
                                $this->CI
                                        ->session
                                        ->set_flashdata('error', 'Something went wrong. Could not Save');
                            } // flash data is displayed in view/register/header.php}
                        
                    }
                redirect('register_student');
			}
			
			public function reload_if_first()
            {
                //To by pass a bug on Anroid Chrome Browser [the browser sending NULL pots values on first submit
                //This function forces a reload if it is chrome and first loading
                $browser = $this->get_user_agent();
                if (strpos(strtolower($browser) , 'chrome') !== FALSE and strpos(strtolower($browser) , 'android') !== FALSE) //if both chrome and andro
                
                    {
                        $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' || $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); //if first loading or not
                        if ($pageRefreshed == 1)
                            {
                                // "page already refrshed";
                                
                            }
                        else
                            {
                                //refreshing page here
                                $value = $_SERVER['PHP_SELF'];
                                $value = explode("/", $value);
                                $value = end($value);
                                redirect($value);
                            }
                    }
                else
                //not a chrome android browser
                
                    {
                    }
            }

        
}
