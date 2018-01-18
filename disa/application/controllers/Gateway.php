<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gateway extends CI_Controller
{
                function __construct()
                {
                                parent::__construct();
                                $this->load->helper('url');
                                $this->load->library('session');
                                $this->load->library('mylibrary');
                }
                public function index()
                {
                                $this->home();
                }
                public function home()
                {
                                redirect('register_student');
                }
                public function register_student()
                {
                                $this->mylibrary->load_page("register_student");
                }
                public function login()
                {
                                $this->mylibrary->load_page("login");
                }
                public function dashboard()
                {
                                $this->mylibrary->load_page("dashboard");
                }
                function student_list()
                {
                                $this->mylibrary->load_page("student_list");
                }
                public function contact()
                {
                }
                public function about()
                {
                }
                public function login_submitted()
                {
                                if ($this->mylibrary->login_check()) // function validates user and set session data
                                                {
                                                redirect("dashboard");
                                } //on success redirects to dashboard}
                                else {
                                                $this->login(); // Redirects to login page on failure
                                }
                }
                public function registration_submitted()
                {
                                $this->mylibrary->registration_form_submitted();
                }
                public function logout()
                {
                                $this->mylibrary->logout();
                                redirect('login');
                }
                public function delete_student($id = '', $email = '')
                {
                                $this->mylibrary->delete_student($id, $email);
                                redirect('student_list');
                }
}
?>


