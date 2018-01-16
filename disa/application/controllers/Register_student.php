<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - get_user_agent()
* - index()
* - reload_if_first()
* - load_main_page()
* - validate_form()
* - convert_date_to_yyyymmdd()
* - convert_date_to_ddmmyyyy()
* - form_submitted()
* - send_mail()
* Classes list:
* - Register_student extends CI_Controller
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_student extends CI_Controller
    {
        // Constructor
        public function __construct()
            {
                parent::__construct();
                $this
                        ->load
                        ->model('database_operations');
                $this
                        ->load
                        ->helper('url');
                $this
                        ->load
                        ->helper('form');
                $this
                        ->load
                        ->library('form_validation');
                $this
                        ->load
                        ->library("session");
                $this
                        ->load
                        ->library('user_agent');
            }
        public function get_user_agent()
            {
                $agent = '';
                if ($this
                        ->agent
                        ->is_browser())
                    {
                        $agent = $agent . $this
                                ->agent
                                ->browser() . ' ' . $this
                                ->agent
                                ->version();
                    }
                if ($this
                        ->agent
                        ->is_robot())
                    {
                        $agent = $agent . $this
                                ->agent
                                ->robot();
                    }
                if ($this
                        ->agent
                        ->is_mobile())
                    {
                        $agent = $agent . $this
                                ->agent
                                ->mobile();
                    }
                return $agent;
            }
        //Index
        public function index()
            {
                $this->load_main_page();
                $this->reload_if_first();
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
        // Loads register_view.php page
        public function load_main_page()
            {
                $data['page'] = "register";
                $data['title'] = 'Register';
                if ($this
                        ->session
                        ->userdata('logged_in'))
                    {
                        $data['logged_in'] = TRUE;
                        $data['user_type'] = $this
                                ->session
                                ->userdata('user_type');
                        $data['username'] = $this
                                ->session
                                ->userdata('username');
                    }
                else
                    {
                        $data['logged_in'] = FALSE;
                        $data['user_type'] = '';
                    }
                $content_header = $this
                        ->load
                        ->view('headers/header', $data, TRUE);
                $content_nav_menu = $this
                        ->load
                        ->view('menu/nav_menu', $data, TRUE);
                $content_body = $this
                        ->load
                        ->view('register/register_view', $data, TRUE);
                $content_flash_msg = $this
                        ->load
                        ->view('layouts/flash_msg', '', TRUE);
                $data['content_header'] = $content_header;
                $data['content_flash_msg'] = $content_flash_msg;
                $data['content_nav_menu'] = $content_nav_menu;
                $data['content_body'] = $content_body;
                $this
                        ->load
                        ->view('layouts/main', $data);
            }
        public function validate_form()
            {
                # Validattion rules form inputs in addition to HTML5 validation on client side
                $this
                        ->form_validation
                        ->set_rules('name', 'Name', 'required');
                $this
                        ->form_validation
                        ->set_rules('u_email', 'Email', 'required');
                $this
                        ->form_validation
                        ->set_rules('dob', "Date of Birth", 'required');
                $this
                        ->form_validation
                        ->set_rules('father', "Father's Name", 'required');
                $this
                        ->form_validation
                        ->set_rules('mother', "Mother's Name", 'required');
                $this
                        ->form_validation
                        ->set_rules('address1', "Address1", 'required');
                $this
                        ->form_validation
                        ->set_rules('address2', "Address2", 'required');
                $this
                        ->form_validation
                        ->set_rules('phone', "Phone", 'required');
                $this
                        ->form_validation
                        ->set_rules('course', "Course", 'required');
                $this
                        ->form_validation
                        ->set_rules('course_details', "Course Deatils", 'required');
                $this
                        ->form_validation
                        ->set_rules('duration_year', "Course Duration Year", 'required');
                $this
                        ->form_validation
                        ->set_rules('duration_month', "Course Duration Month", 'required');
                $this
                        ->form_validation
                        ->set_rules('finance', "Financial Status", 'required');
                $this
                        ->form_validation
                        ->set_rules('if_working', "Are you working", 'required');
                return $this
                        ->form_validation
                        ->run();
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
        //convers date into dd/mm/yyyy to be used for user forms
        function convert_date_to_ddmmyyyy($date)
            {
                $date = explode('-', $date);
                $day = $date[0];
                $month = $date[1];
                $year = $date[2];
                $new_date = $year . "/" . $month . "/" . $day;
                return $new_date;
            }
        //called on form submition
        public function form_submitted()
            {
                //checks the validation rules already set in this class
                if ($this->validate_form() == FALSE)
                    {
                        $this
                                ->session
                                ->set_flashdata('error', 'Data entered could not be validated');
                    }
                else
                    {
                        //The name of array elements is the same name in dtabase fields
                        $list = array(
                                'name' => $this
                                        ->input
                                        ->post('name', TRUE) , //TRUE for xss clean
                                'gender' => $this
                                        ->input
                                        ->post('gender', TRUE) ,
                                'dob' => $this->convert_date_to_yyyymmdd($this
                                        ->input
                                        ->post('dob', TRUE)) , // function converts date to mysqlcompatible format
                                'email' => $this
                                        ->input
                                        ->post('u_email', TRUE) ,
                                'father' => $this
                                        ->input
                                        ->post('father', TRUE) ,
                                'mother' => $this
                                        ->input
                                        ->post('mother', TRUE) ,
                                'address1' => $this
                                        ->input
                                        ->post('address1', TRUE) ,
                                'address2' => $this
                                        ->input
                                        ->post('address2', TRUE) ,
                                'phone' => $this
                                        ->input
                                        ->post('phone', TRUE) ,
                                'course_name' => $this
                                        ->input
                                        ->post('course', TRUE) ,
                                'course_details' => $this
                                        ->input
                                        ->post('course_details', TRUE) ,
                                'institution' => $this
                                        ->input
                                        ->post('institution', TRUE) ,
                                'course_duration_year' => $this
                                        ->input
                                        ->post('duration_year', TRUE) ,
                                'course_duration_month' => $this
                                        ->input
                                        ->post('duration_month', TRUE) ,
                                'financial_status' => $this
                                        ->input
                                        ->post('finance', TRUE) ,
                                'if_working' => $this
                                        ->input
                                        ->post('if_working', TRUE) ,
                                'working_details' => $this
                                        ->input
                                        ->post('working_type', TRUE) ,
                                'interest' => $this
                                        ->input
                                        ->post('interests', TRUE) ,
                                'career_aspiration' => $this
                                        ->input
                                        ->post('aspiration', TRUE)
                        );
                        if ($this
                                ->database_operations
                                ->insert_student($list)) // if operation success returns TRUE
                        
                            {
                                //$this->send_mail();
                                $this
                                        ->session
                                        ->set_flashdata('success', 'Successfully Saved Data');
                            } // flash data is displayed in view/register/header.php
                        else
                            {
                                $this
                                        ->session
                                        ->set_flashdata('error', 'Something went wrong. Could not Save');
                            } // flash data is displayed in view/register/header.php}
                        
                    }
                redirect('register_student');
            }
        //Sends email to given email id
        public function send_mail()
            {
                $this
                        ->load
                        ->library('email');
                //echo "email info <br>".phpinfo();
                $data['salutation'] = 'Hello  ' . $this
                        ->input
                        ->post('name', TRUE);
                $data['message'] = " Thank you for registering with DISA";
                $email_text = $this
                        ->load
                        ->view('layouts/email_text', $data, TRUE);
                //try
                //{
                //echo $email_text;
                //$this->email->from('donot_replay@disa.com', 'Disa');
                //$this->email->to('someone@example.com');
                //$this->email->subject('Disa Registration Successul');
                //$this->email->message("hi");//$email_text);
                //$this->email->send();
                //echo "sent";
                //$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <disa@disa.com>' . "\r\n";
                $subject = " Disa Registration Successul";
                $to = $this
                        ->input
                        ->post('email', TRUE);
                mail($to, $subject, $email_text, $headers);
                //}
                //catch (Exception $e) //doing nthng on error
                //{
                // }
                
            }
    }
?>
