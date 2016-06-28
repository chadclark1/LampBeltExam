<?php 
	// $session = $this->session->userdata('is_logged_in');
	// if ($session == FALSE) {
	// 	redirect("/users/signin");
	// }

	// $user_level = $this->session->userdata('user_level');
	// if ($user_level != "admin") {
	// 	redirect("/users/signin");
	// }

	// var_dump($this->session->all_userdata());

var_dump($this->session->flashdata('error'));

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Add Plan</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="../assets/style.css">

	</head>
		<body>
		<header>
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a href="/">
				      <h1 class="navbar-brand">
				       	Travel!
				      </h1>
			      </a>
			    </div>
			    <div class="text-right">
			      	<a href="/users/show_schedule" class="btn btn-primary">Home</a>
			      	<a href="/users/logout" class="btn btn-danger">Sign Out</a>
			    </div>
			  </div>
			</nav>
		</header>
		<div class="container">
<?php
$error = $this->session->flashdata('error');
if($error){
?>
				<h5><?php echo $error ?></h5>
<?php
}
?>
			<h2>Add a Trip</h2>

			<div class="col-md-5">
				<form action="/travels/add" method="post" >

					<fieldset>
						<label for="destination"> Destination:</label>
						<input type="text" name="destination" class="form-control" placeholder="London" ></input>
					</fieldset>
					<fieldset>
						<label for="description">Description</label>
						<input type="text" name="description" class="form-control" placeholder="See Big Ben..."></input>
					</fieldset>
					<fieldset>
						<label for="date_from">Travel Date From:</label>
						<input type="text" name="date_from" class="form-control" placeholder="YYYY/MM/DD"></input>
					</fieldset>
					<fieldset>
						<label for="date_to">Travel Date To:</label>
						<input type="text" name="date_to" class="form-control" placeholder="YYYY/MM/DD"></input>
					</fieldset>
					<div class="text-right">
					<button type="submit" class="btn btn-success submit">Add</button>
					</div>
				</form>
			</div>

		</div>
	</body>
</html>