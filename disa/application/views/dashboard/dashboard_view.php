<?
/**
* Class and Function List:
* Function list:
* Classes list:
*/
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $attributes = array(
        'name' => 'plain_form'
); ?>

<?php echo form_open('student_list', $attributes); ?>

<?php

$data = array(
        'name' => 'button1',
        'autofocus' => 'autofocus',
        'id' => 'button1',
        'type' => 'button',
        'onclick' => " window.location.href='student_list'",
        'value' => "View Registered Students",
        'class' => "button button1"

);

echo form_input($data);
?>     
        
  <?php echo form_close(); ?>
