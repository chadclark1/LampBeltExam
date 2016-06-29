<?php ?>


<!DOCTYPE html>
<html>
	<head>
		<title>Login/Registration</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="assets/style.css">

	</head>
		<body>
		<header>
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a href="/">
				      <h1 class="navbar-brand">
				       	Wishlist
				      </h1>
			      </a>
			    </div>
			  </div>
			</nav>
		</header>
		<div class="container">

			<h2>Welcome!</h2>
			
			<div class="text-center">
			<div class="col-md-6 col-md-offset-3 errors">
<?php 
				if($this->session->flashdata('login_error')){
?>
					<h5><?php echo $this->session->flashdata('login_error'); ?></h5>

<?php
			}
?>
<?php 
				if($this->session->flashdata('date_check')){
?>
					<h5><?php echo $this->session->flashdata('date_check'); ?></h5>

<?php
			}
?>
				</div>
			</div>
			<row>
				<div class="col-md-5 col-md-offset-1">
					<div class="form">
						<h3 id="enter-address">Register</h3>
						<form action="/users/register" method="post">
							<fieldset class="form-group">
							    <label for="first_name">First Name:</label>
							    <input type="text" name ="first_name" class="form-control" id="first_name" placeholder="First Name">
							</fieldset>
							<fieldset class="form-group">
							    <label for="last_name">Last Name:</label>
							    <input type="text" name ="last_name" class="form-control" id="last_name" placeholder="Last Name">
							</fieldset>
							<fieldset class="form-group">
							    <label for="username">Username:</label>
							    <input type="text" name ="username" class="form-control" id="username" placeholder="Username">
							</fieldset>
							<fieldset class="form-group">
							    <label for="password">Password:</label>
							    <input type="password" name ="password" class="form-control" id="password">
							</fieldset>
							<fieldset class="form-group">
							    <label for="confirm">Confirm Password:</label>
							    <input type="password" name ="confirm" class="form-control" id="confirm">
							</fieldset>
							<fieldset class="form-group">
							    <label for="date">Date Hired</label>
							    <input type="text" name ="date" class="form-control" placeholder="YYYY/MM/DD" id="date">
							</fieldset>
							<input type="hidden" name="action" value="register">
							<button type="submit" class="btn btn-primary">Register</button>
						</form>
					</div>
				</div>
			</row>

			<row>
				<div class="col-md-5">
					<div class="form">
						<h3 id="enter-address">Login</h3>
						<form action="/users/login" method="post">
							<fieldset class="form-group">
							    <label for="username">Username:</label>
							    <input type="text" name ="username" class="form-control" id="username" placeholder="username">
							</fieldset>
							<fieldset class="form-group">
							    <label for="password">Password:</label>
							    <input type="password" name ="password" class="form-control" id="password">
							</fieldset>
							<input type="hidden" name="action" value="login">
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
					</div>
				</div>
			</row>
			
		</div>


		</body>
</html>