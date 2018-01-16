<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	
        <h1>Login Page</h1>
	
	
	
	<div class="main-w3layouts-form">
		<h2>Login to your account</h2>
		
		<!-- form -->
		
		
<?php $attributes = array(
        'name' => 'login_form'
); ?>

<?php echo form_open('login/form_submitted', $attributes); ?>
		
		<!-- Useranme -->
		
			<div class="fields-w3-agileits">
				<span class="fa fa-user" aria-hidden="true"></span>
				
<?php

$data = array(
        'name' => 'username',
        'autofocus' => 'autofocus',
        'id' => 'username',
        'placeholder' => 'Username',
        'required' => 'required',
);

echo form_input($data);
?>     
				
			<!--Password-->	
				
			</div>
			<div class="fields-w3-agileits">
				<span class="fa fa-key" aria-hidden="true"></span>
				<?php

$data = array(
        'name' => 'password',
        'id' => 'password',
        'placeholder' => 'Password',
        'required' => 'required',
        'type' => 'password'
);

echo form_input($data);
?> 
				
			</div>
			<div class="remember-section-wthree">
				<ul>
					<li>
						<label class="anim">
							<input type="checkbox" class="checkbox" name="remember">
							<span> Remember me ?</span> 
						</label>
					</li>
					<li> <a href="#">Forgot password?</a> </li>
				</ul>
				<div class="clear"> </div>
			</div>
			<input type="submit" value="Login" />
		</form>
		
	</div>
	
	<div class="copyright-w3-agile">
		<p>The style of the page is an adaptation of a  template found on <a href="http://w3layouts.com/" target="_blank">W3layouts</a>			</p>
	</div>
	
</body>
