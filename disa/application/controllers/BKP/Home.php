<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - index()
* Classes list:
* - Home extends CI_Controller
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
    {

        function __construct()
            {

                parent::__construct();

                $this
                        ->load
                        ->helper('url');
            }
        public function index()
            {

                redirect('register_student');

            }
    }

?>
