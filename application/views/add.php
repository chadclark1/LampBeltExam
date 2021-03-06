<?php 
	$session = $this->session->userdata('is_logged_in');
	if ($session == FALSE) {
		redirect("/users/signin");
	}

	// $user_level = $this->session->userdata('user_level');
	// if ($user_level != "admin") {
	// 	redirect("/users/signin");
	// }



?>


<!DOCTYPE html>
<html>
	<head>
		<title>Add Item</title>

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
				       	Wishlist
				      </h1>
			      </a>
			    </div>
			    <div class="text-right">
			      	<a href="/users/dashboard" class="btn btn-primary">Home</a>
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
			<h2>Add an Item</h2>

			<div class="col-md-5">
				<form action="/items/add_item" method="post" >

					
					<fieldset>
						<label for="description">Item/Product</label>
						<input type="text" name="description" class="form-control" placeholder="Item Name"></input>
					</fieldset>
					
					<div class="text-right">
					<button type="submit" class="btn btn-success submit">Add</button>
					</div>
				</form>
			</div>

		</div>
	</body>
</html>