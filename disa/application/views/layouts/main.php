<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
defined('BASEPATH') OR exit('No direct script access allowed');

//This layout receives data from other views and display accordingly
 ?>


<!DOCTYPE HTML>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Disa ottathara, kodur, malappuram, education, academic, learning, job, employment, dierecting, supporting, aspiring, acheiving"/>
<meta name="author" content="Asif Disa" />


<title><?php if (isset($title)):
        echo $title;
endif; ?></title> 




 <?php if (isset($content_header)):
        echo $content_header;
endif; ?><?php //- $content header data is passed from header_view dynamically-
 ?>
</head>
<body>
<?php if (isset($content_flash_msg)):
        echo $content_flash_msg;
endif; ?>
<?php if (isset($content_nav_menu)):
        echo $content_nav_menu;
endif; ?>
<?php if (isset($content_body)):
        echo $content_body;
endif; ?>
<?php if (isset($content_footer)):
        echo $content_footer;
endif; ?>

</body>
</html>
