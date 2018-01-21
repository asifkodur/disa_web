
	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class and Function List:
 * Function list:
 * - __construct()
 * - index()
 * - password_change()
 * - login_check()
 * - insert_student()
 * - get_student_list()
 * - delete_student()
 * Classes list:
 * - Database_operations extends CI_Model
 */
Class Database_operations extends CI_Model
{
        // Constructor
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('date');
                $this->load->database();
        }
        //Index
        public function index()
        {
                echo "hi";
        }
        public function password_change($username, $current_pass, $new_password)
        {
        }
        //Check login against db record on success returns user_type else FALSE
        public function login_check($username, $password)
        {
                //var_dump($password);
                //$this->db->where('username', $username);
                //$this->db->update('user', array('password'=>password_hash($password, PASSWORD_DEFAULT)));
                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('username', $username);
                $result = $this->db->get();
                if ($result->num_rows() < 1) {
                        return FALSE;
                } else {
                        //return $result->result();
                        $row = $result->row();
                        if (password_verify($password, $row->password)) {
                                var_dump($row->user_type);
                                return $row->user_type;
                        } else {
                                return FALSE;
                        }
                }
        }
        // Inserts students recorrd to database
        public function insert_student($data)
        {
                $this->db->set('created_time', 'NOW()', FALSE);
                $this->db->insert('student', $data);
                if ($this->db->affected_rows() > 0) {
                        return TRUE;
                }
                return FALSE;
        }
        public function get_student_list($list = array()) # query condition as parameter (keyed array), fetches all if array empty
        {
                $this->db->select('*');
                $this->db->from('student');
                $this->db->order_by("created_time", "DESC");
                $this->db->order_by("name", "ASC");
                if (isset($list)) {
                        $this->db->where($list);
                }
                $query = $this->db->get();
                return $query->result_array();
        }
        public function delete_student($data)
        {
                $this->db->delete("student", $data);
                if ($this->db->affected_rows() > 0) {
                        return TRUE;
                }
                return FALSE;
        }
}
