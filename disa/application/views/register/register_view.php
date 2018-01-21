<?php
/**
 * Class and Function List:
 * Function list:
 * Classes list:
 */
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-agileits">
 <h1 class="title" ><font color="teal">DISA OTTATHARA</font>
    <br><br>
    

    Student Data Bank</h1>      
  
<div class="left">




<?php $attributes = array(
        'data-toggle' => 'validator',
        'name' => 'student_form',
        'name' => 'myform'
); //

?>

<?php echo form_open('registration_submitted', $attributes); ?>

<!-- Name input and Label-->


<div class="form-group">
<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Name*', 'name', $attribute);

$data = array(
        'name' => 'name',
        'classs' => 'form-control',
        'autofocus' => 'autofocus',
        'id' => 'name',
        'placeholder' => 'Name',
        'required' => 'required',
        'data-error' => 'Enter your Name',
        'onfocusout' => 'this.value = this.value.toUpperCase();'
);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>
		
				
		
		<!-- Gender and Label-->        
        <div class="form-group w3ls-opt"> 
                
        <?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Gender*', 'gender3', $attribute); ?>		
		<label class="w3layouts">
			

       <?php $data = array(
        'name' => 'gender',
        'id' => 'gender1',
        'value' => 'male',
        'checked' => TRUE

);

echo form_radio($data);
?>
Male</label> 
<label class="w3layouts">
			

       <?php $data = array(
        'name' => 'gender',
        'id' => 'gender2',
        'value' => 'female'

);
echo form_radio($data);
?>
Female</label> 
<label class="w3layouts">
			

       <?php $data = array(
        'name' => 'gender',
        'id' => 'gender3',
        'value' => 'other'

);
echo form_radio($data);
?>
Other</label> 

<div class="help-block with-errors"></div>

</div>
 <!-- Gender Ends here -->
 
 
<!-- Date of B-->
<div class="form-group">
<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Date of Birth*', 'dob', $attribute);
$data = array(
        'name' => 'dob',
        'classs' => 'form-control',
        'id' => 'dob',
        'placeholder' => 'dd/mm/yyyy',
        'required' => 'required',
        'data-error' => 'Enter Date of Birth in dd/mm/yyyy format',
        'pattern' => '\d{1,2}/\d{1,2}/\d{4}'
);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>
		
		
		 
<!-- Email-->
<div class="form-group">
<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Email*', 'u_email', $attribute);

$data = array(
        'name' => 'u_email',
        'classs' => 'form-control',
        'id' => 'u_email',
        'placeholder' => 'Email',
        'required' => 'required',
        'data-error' => 'Enter valid email',
        'type' => 'email',
        'style' => 'text-transform:lowercase'
);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>	

<!-- Father-->

<div class="form-group">
<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Name of Father/Parent/Husband*', 'father', $attribute);

$data = array(
        'name' => 'father',
        'classs' => 'form-control',
        'id' => 'father',
        'placeholder' => 'Name of Father',
        'required' => 'required',
        'data-error' => 'Enter Name of Father',
        'onfocusout' => 'this.value = this.value.toUpperCase();'

);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>

<!-- Mother-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Name of Mother*', 'mother', $attribute);

$data = array(
        'name' => 'mother',
        'classs' => 'form-control',
        'id' => 'mother',
        'placeholder' => 'Name of Mother',
        'required' => 'required',
        'data-error' => 'Enter Name of Mother',
        'onfocusout' => 'this.value = this.value.toUpperCase();'

);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>

	
	
<!-- Address1-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Address*', 'address1', $attribute);

$data = array(
        'name' => 'address1',
        'classs' => 'form-control',
        'id' => 'address1',
        'placeholder' => 'Address',
        'required' => 'required',
        'data-error' => 'Enter Address',
        'onfocusout' => 'this.value = this.value.toUpperCase();',
        'rows' => '2'

);

echo form_textarea($data);
?>               
		<div class="help-block with-errors"></div></div>
		
		
		
	
<!-- Address2-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Address', 'address2', $attribute);

$data = array(
        'name' => 'address2',
        'classs' => 'form-control',
        'id' => 'address2',
        'data-error' => 'Enter Address',
        'onfocusout' => 'this.value = this.value.toUpperCase();',
        'value' => 'Ottathara
Kodur
Malappuram
Pin:676504',
        'rows' => '4',
        'readonly' => 'readonly'
);

echo form_textarea($data);
?>               
		<div class="help-block with-errors"></div></div>



<!-- Phone-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Phone*', 'phone', $attribute);

$data = array(
        'name' => 'phone',
        'classs' => 'form-control',
        'id' => 'phone',
        'placeholder' => 'Phone',
        'required' => 'required',
        'data-error' => 'Enter a valid Phone number',
        'type' => 'number'

);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>
		
		
		
		<!-- Course-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Course Presently Studying/Last Studied*', 'course', $attribute);

$options = array(
        '' => 'Select',
        'hsc' => '+2',
        'vhsc' => 'VHSC',
        'certificate' => 'Certificate Course',
        'diploma' => 'Diploma',
        'graduation' => 'Graduation',
        'professional' => 'Professional Degree',
        'bed' => 'B.Ed',
        'pg' => 'Post Graduation',
        'mphil' => 'M Phil',
        'research' => 'Research',
        'others' => 'Others'

);

echo form_dropdown('course', $options, '', ' id="course" class="form-control" required="required" ');
?>               
		<div class="help-block with-errors"></div></div>


	<!-- Course Details-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Course Details (Group/Main/Branch)*', 'course_details', $attribute);

$data = array(
        'name' => 'course_details',
        'classs' => 'form-control',
        'id' => 'course_details',
        'placeholder' => 'Course Details',
        'required' => 'required',
        'onfocusout' => 'this.value = this.value.toUpperCase();',
        'data-error' => 'Enter Course Details',

);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>
		
		


<!-- Institution-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Name of Institution*', 'institution', $attribute);

$data = array(
        'name' => 'institution',
        'classs' => 'form-control',
        'id' => 'institution',
        'placeholder' => 'Institution',
        'required' => 'required',
        'onfocusout' => 'this.value = this.value.toUpperCase();',
        'data-error' => 'Name of Institution',

);

echo form_input($data);
?>               
		<div class="help-block with-errors"></div></div>

		
		
		
		
			<!-- Duration Year-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Course Duration (Year)*', 'duration_year', $attribute);

$options = array(
        '' => 'Select',
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7'

);

echo form_dropdown('duration_year', $options, '', 'required="required" id="duration_year" class="form-control"');
?>               
		<div class="help-block with-errors"></div></div>


<!-- Duration Month-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Course Duration(Month)*', 'duration_month', $attribute);

$options = array(
        '' => 'Select',
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11'

);

echo form_dropdown('duration_month', $options, '', 'required="required" id="duration_month" class="form-control"');
?>               
		<div class="help-block with-errors"></div></div>


<!-- Finance -->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Financial Status*', 'finance', $attribute);

$options = array(
        '' => 'Select',
        'apl' => 'APL',
        'bpl' => 'BPL',
        'not_specified' => 'Prefer not Say'

);

echo form_dropdown('finance', $options, '', 'id="finance" class="form-control"');
?>               
		<div class="help-block with-errors"></div></div>



<!-- Working Status -->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Are you working now?*', 'if_working', $attribute);

$options = array(
        '' => 'Select',
        'no' => 'No',
        'yes' => 'Yes'

);

echo form_dropdown('if_working', $options, '', 'onchange="change_work_option(this);"  id="if_working" required="required" class="form-control"');
?>               
		<div class="help-block with-errors"></div></div>




<!-- Working Type -->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('If working, details of employment', 'working_type', $attribute);

$options = array(
        '' => 'Select',
        'government' => 'Government',
        'private' => 'Private',
        'self employed' => 'Self Employed',
        'others' => 'Others'

);

echo form_dropdown('working_type', $options, '', 'onchange="change_work_option(this);"  id="working_type" disabled class="form-control"');
?>               
		<div class="help-block with-errors"></div></div>


<!-- Interests-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Interests', 'interests', $attribute);

$data = array(
        'name' => 'interests',
        'classs' => 'form-control',
        'id' => 'interests',
        'placeholder' => 'Interests',
        'onfocusout' => 'this.value = this.value.toUpperCase();',

);

echo form_input($data);
?>               
		</div>



<!-- Aspiration-->

<div class="form-group">	

<?php $attribute = array(
        'class' => 'control-label'
);
echo form_label('Aspiration', 'aspiration', $attribute);

$data = array(
        'name' => 'aspiration',
        'classs' => 'form-control',
        'id' => 'aspiration',
        'placeholder' => 'Aspiration',
        'onfocusout' => 'this.value = this.value.toUpperCase();',

);

echo form_input($data);
?>               
		</div>

<?php $data = array(
        'name' => 'submit',
        'value' => 'submit',
        'type' => 'submit',
        'class' => 'btn btn-primary btn-lg btn-block',
        'onclick' => 'javascript:checkBrowser()',
        'id' => 'submit'
) ?>


<div class="form-group"> <?php echo form_input($data); ?></div>





<?php echo form_close(); ?>



</div></div>



<script src="<? echo base_url(); ?>js/register/jquery-2.1.4.min.js"></script><!-- //js -->
<script src="<? echo base_url(); ?>js/register/bootstrap.min.js"></script>
<script src="<? echo base_url(); ?>js/register/validator.min.js"></script><!-- /js files -->
