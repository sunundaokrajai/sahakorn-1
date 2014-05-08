<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap Stylesheet -->
<link rel="stylesheet" href="<?php echo control_url("bootstrap/css/bootstrap-login.min.css");?>" media="screen">

<!-- Uniform Stylesheet -->
<link rel="stylesheet" href="<?php echo control_url("plugins/uniform/css/uniform.default.css");?>">

<!-- Plugin Stylsheets first to ease overrides -->

<!-- End Plugin Stylesheets -->

<!-- Main Layout Stylesheet -->
<link rel="stylesheet" href="<?php echo control_url("assets/css/fonts/icomoon/style.css");?>" media="screen">
<link rel="stylesheet" href="<?php echo control_url("assets/css/login-style.css");?>" media="screen">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>ระบบเงินทุนสวัสดิการข้าราชการและลูกจ้างกรุงเทพมหานคร</title>

</head>

<body>


    <div id="login-wrap">

		<div id="login-ribbon"><i class="icon-lock"></i></div>

		<div id="login-buttons">
			<div class="btn-wrap">
				<button type="button" class="btn btn-inverse" data-target="#login-form"><i class="icon-key"></i></button>
			</div>
				
			<!--
			<div class="btn-wrap hide">
				<button type="button" class="btn btn-inverse" data-target="#register-form"><i class="icon-edit"></i></button>
			</div>
			<div class="btn-wrap hide">
				<button type="button" class="btn btn-inverse"data-target="#forget-form"><i class="icon-question-sign"></i></button>
			</div>
			-->
		</div>
		
		<div id="#da-ex-val1-error"></div>

		<div id="login-inner">

			<div id="login-circle">
				<section id="login-form" class="login-inner-form active" data-angle="0">
					<h1>Login</h1>
					<?php echo form_open("",array("id"=>"frmlogin","class"=>"form-vertical"));?>
						<div class="control-group">
							<input type="text" placeholder="Username" name='username' autocomplete="off" id="input-username" class="big">
							<input type="password" placeholder="Password" name='pw'  id="input-password" class="big">
						</div>
						<div class="control-group">
							<label class="checkbox">
								<input type="checkbox" class="uniform"> Remember me
							</label>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-success btn-block btn-large">Login</button>
						</div>
					<?php echo form_close();?>

				</section>
				<section id="register-form" class="login-inner-form" data-angle="90">
					<h1>Register</h1>
					<?php echo form_open("",array("id"=>"frm-register","class"=>"form-vertical"));?>
						<div class="control-group">
							<label class="control-label">Email</label>
							<div class="controls">
								<input type="text">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Password</label>
							<div class="controls">
								<input type="password">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Fullname</label>
							<div class="controls">
								<input type="text">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Payment Method</label>
							<div class="controls">
								<select>
									<option>PayPal</option>
									<option>Credit Card</option>
								</select>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-danger btn-block btn-large">Register</button>
						</div>
					<?php echo form_close();?>
				</section>
				<section id="forget-form" class="login-inner-form" data-angle="180">
					<h1>Reset Password</h1>
					<?php echo form_open("",array("id"=>"frm-forgetpass","class"=>"form-vertical"));?>
						<div class="control-group">
							<div class="controls">
								<input type="text" class="big" placeholder="Enter Your Email...">
							</div>
						</div>
						<div class="form-actions">
							<input type="hidden" name="login" value="onlogin"/>
							<button type="submit" class="btn btn-danger btn-block btn-large">Reset</button>
						</div>
					<?php echo form_close();?>
				</section>
			</div>

		</div>

    </div>

	<!-- Core Scripts -->
	<script src="<?php echo control_url("assets/js/libs/jquery-1.8.2.min.js");?>"></script>
	<script src="<?php echo control_url("assets/js/libs/jquery.placeholder.min.js");?>"></script>
	<script src="<?php echo control_url("plugins/validate/jquery.validate.min.js");?>"></script>
    
    <!-- Login Script -->
    <script src="<?php echo control_url("assets/js/login.js");?>"></script>
    <style>
    	label.error{display:none !important;}
    	input.error{border:1px solid red;}
    </style>
    
    <script>
    $(document).ready(function(){
	   $("#frmlogin").validate({
			rules: {
				username: {
					required: true
				}, 
				pw: {
					required: true
				}
			}, 
			invalidHandler: function(form, validator) {
				var errors = validator.numberOfInvalids();
				if (errors) {
					var message = errors == 1
					? 'You missed 1 field. It has been highlighted'
					: 'You missed ' + errors + ' fields. They have been highlighted';
					$("#da-ex-val1-error").html(message).show();
				} else {
					$("#da-ex-val1-error").hide();
				}
			}
		});
    });
    </script>

    <!-- Uniform Script -->
    <script src="<?php echo control_url("plugins/uniform/jquery.uniform.min.js");?>"></script>

</body>

</html>
