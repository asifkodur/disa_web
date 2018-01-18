<?php

/**
* Class and Function List:
* Function list:
* - __construct()
* - redirect_if_not_logged_in()
* - index()
* - load_main_page()
* - delete_student()
* Classes list:
* - Student_list extends CI_Controller
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_list extends CI_Controller
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
                //$this->load->helper('form');
                $this
                        ->load
                        ->library("session");

                $this->redirect_if_not_logged_in();

            }

        //Redirects if not logged in
        public function redirect_if_not_logged_in()
            {
                if (!$this
                        ->session
                        ->userdata('logged_in'))
                    {
                        // List in this array methods in this class allowed without logging in
                        $allowed = array();

                        if (!in_array($this
                                ->router
                                ->fetch_method() , $allowed))
                            {
                                redirect('login');
                            }
                    }
            }

        public function index()
            {

                $this->load_main_page();
            }

        public function load_main_page()
            {

                $data['title'] = "Student List";
                $data['page'] = 'student_list';
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

                $data['student_list'] = $this
                        ->database_operations
                        ->get_student_list();
                $content_body = $this
                        ->load
                        ->view('student_list/student_list_view', $data, TRUE);
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

        //Deletes student record frm db where email and uerid match
        public function delete_student($id = '', $email = '')

            { // check if root user(previlleged) to delete
                if ($this
                        ->session
                        ->userdata('user_type') != 'root')
                    {
                        redirect('student_list');
                    }

                if ($id != '' and $email != '')
                    {
                        $id = strip_tags(trim($id));
                        $email = strip_tags(trim(urldecode($email)));

                        if ($this
                                ->database_operations
                                ->delete_student(array(
                                'student_id' => $id,
                                'email' => $email
                        ))) // gets TRUE on successful delettion
                        
                            {

                                $this
                                        ->session
                                        ->set_flashdata('success', 'Successfully Deleted Data');
                            } // flash data is displayed in view/register/header.php
                        else
                            {
                                $this
                                        ->session
                                        ->set_flashdata('error', 'Something went wrong. Could not Delete');
                            } // flash data is displayed in view/register/header.php}
                        

                        
                    }
                else
                    {
                        $this
                                ->session
                                ->set_flashdata('error', 'Something went wrong. Could not Delete');
                    }
                $this->load_main_page();

            }

    }

