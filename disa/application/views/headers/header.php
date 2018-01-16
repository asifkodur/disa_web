<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        
<?php //Nav bar Links Starts
 ?>
		<link href="<? echo base_url(); ?>css/nav_bar/style.css" rel="stylesheet">
		
                               
   <?php //Nav bar bootsrap
 ?>
  <script src="<? echo base_url(); ?>js/nav_bar/script.js"></script>
                    
         <?php //Nav bar Links ends
 ?>

<?php if (isset($page)): // customises header for each page through switch
         ?>


<?php switch ($page):
        case "login": // On login page
                 ?>

<script src="<? echo base_url(); ?>js/register/jquery-2.1.4.min.js"></script><!-- //js -->
<script src="<? echo base_url(); ?>js/register/bootstrap.min.js"></script>
          
<link href="<?php echo base_url(); ?>css/register/bootstrap.css" rel="stylesheet" type="text/css" media="all">

<link href="<? echo base_url(); ?>css/login/style.css" rel='stylesheet' type='text/css' />

<?php
        break; ?>


<?php
        case "home": ?>

<?php
        break; ?>

<?php
        case "register": // Login page header
                 ?>

<script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }

    
		//this function enables and disables the field 'working details' in respose to the changes  to 'if_working'
    function change_work_option(obj) {

        var selected_obj = document.getElementById("if_working");

        var selected_value = selected_obj[selected_obj.selectedIndex].value;

        if (selected_value === "yes") {

            document.getElementById("working_type").disabled = false;

        } else {

            document.getElementById("working_type").disabled = true;

        }
    }
</script>



<!-- /fonts -->
<!-- css -->
<link href="<? echo base_url(); ?>css/register/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<? echo base_url(); ?>css/register/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css -->

<?php
        break; ?>
<?php
        case "dashboard": ?>




<script src="<? echo base_url(); ?>js/register/jquery-2.1.4.min.js"></script><!-- //js -->
<script src="<? echo base_url(); ?>js/register/bootstrap.min.js"></script>

<link href="<? echo base_url(); ?>css/dashboard/style.css" rel="stylesheet">

<?php
        break; ?>
<?php
        case "student_list": ?>



<script src="<? echo base_url(); ?>js/register/jquery-2.1.4.min.js"></script><!-- //js -->
<script src="<? echo base_url(); ?>js/register/bootstrap.min.js"></script>



<link href="<?php echo base_url(); ?>css/register/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="<? echo base_url(); ?>css/student_list/style.css" rel="stylesheet" type="text/css" media="all" />
<?php
        break; ?>

<?php
        case "about": ?>

<?php
        break; ?>

<?php
        case "contact": ?>

<?php
        break; ?>


<?php
        endswitch; ?>


<?php
endif; ?>
