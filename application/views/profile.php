<?php 
	// var_dump($this->session->all_userdata()); 
	// $user_level = $this->session->userdata('user_level');

	$session = $this->session->userdata('is_logged_in');
	if ($session == FALSE) {
		redirect("/users/signin");
	}
	$users = $this->session->userdata('users');
	// var_dump($users);
?>

<html>
	<head>
		<title>Item Profile</title>

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

		
			<h2 class="col-md-12"><?php echo $item['description']?></h2>
			
			
			



			
			<h4 class="col-md-12">Users who added this product/item to their wishlist:</h4>

<?php 
	foreach ($users as $user) {
		// echo $user['item_id'] . ' ' . $item['id']  . "<br><br>";
		if($user['item_id'] === $item['id']){
?>
			<h5 class="col-md-12"><li><?php echo $user['first_name'] ?></li></h5>
<?php
		}
	}
?>

			

		</div>
	</body>
</html>