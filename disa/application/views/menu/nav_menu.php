<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
defined('BASEPATH') OR exit('No direct script access allowed');

// Nav bar items
// Nav bar css and js already added in header view
//Prepares link and name for each menu item below
$navs['home'] = array(
        "label" => "Home",
        "link" => site_url('home') ,
        "if_active" => "no"
);

$navs['register'] = array(
        "label" => "Register",
        "link" => site_url("register_student") ,
        "if_active" => "no"
);

$navs['contact'] = array(
        "label" => "Contact",
        "link" => "#",
        "if_active" => "no"
);

$navs['about'] = array(
        "label" => "About",
        "link" => "#",
        "if_active" => "no"
);

$navs['login'] = array(
        "label" => "Login",
        "link" => site_url('login') ,
        "if_active" => "no"
);

if (isset($logged_in) and ($logged_in)) // adds logout and dashboard only if user is logged in

    {

        $navs['dashboard'] = array(
                "label" => "Dashboard",
                "link" => site_url("dashboard") ,
                "if_active" => "no"
        );

        $navs['logout'] = array(
                "label" => "Logout",
                "link" => site_url("login/logout") ,
                "if_active" => "no"
        );

        $navs['welcome_msg'] = array(
                "label" => $username,
                "link" => "#",
                "if_active" => "no"
        );

        unset($navs['login']);

    }

//customises menu for each page
 ?>
    <?php if (isset($page)): ?>      
       
    
<?php switch ($page):
        case "login": // On login page
                $navs['login']['if_active'] = "yes";
                $navs['login']['link'] = "#";

        break;

        case "home":
                $navs['home']['if_active'] = "yes";
                $navs['home']['link'] = "#";
        break;

        case "register": // Login page header
                $navs['register']['if_active'] = "yes";
                $navs['register']['link'] = "#";
        break;

        case "dashboard":
                $navs['dashboard']['if_active'] = "yes";
                $navs['dashboard']['link'] = "#";
        break;

        case "contact":
                $navs['contact']['if_active'] = "yes";
        break;

        case "about":
                $navs['about']['if_active'] = "yes";
                $navs['about']['link'] = "#";

        break;

        endswitch;

endif;

?>
		 
  
<div class="topnav" id="myTopnav">
	
	
	
	<?php foreach ($navs as $item): ?>	
	<?php if (isset($navs['welcome_msg']) and $item == $navs['welcome_msg']): ?><a  href="<?=$item['link'] ?>" <?php if ($item['if_active'] == 'yes'): ?>class="active"  <?php
                endif; ?> style="color:red" style="background-color:#ffffa0"><?=$item['label'] ?></a>  
	<?
        else: ?>
	
    <a href="<?=$item['link'] ?>" <?php if ($item['if_active'] == 'yes'): ?>class="active"  <?php
                endif; ?>><?=$item['label'] ?></a>  
       <?php
        endif; ?>
    <?php
endforeach; ?>
  
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
