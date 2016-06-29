<?php 
	// var_dump($this->session->all_userdata()); 
	// $user_level = $this->session->userdata('user_level');

	// $session = $this->session->userdata('is_logged_in');
	// if ($session == FALSE) {
	// 	redirect("/users/signin");
	// }
	// var_dump($this->session->all_userdata());
	// var_dump($destination);
	// var_dump($this->session->userdata('destination'));
	// var_dump($destination);
	// echo "<br>";
	// echo "<br>";
	// echo $this->session->userdata('destination');
	$users_trips = $this->session->userdata('users_trips');
	// var_dump($users_trips);
?>

<html>
	<head>
		<title>Destination</title>

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

		
			<h2 class="col-md-12"><?php echo $destination['destination']?></h2>
			
			<h4 class="col-md-11 col-md-offset-1">Description: <?php echo $destination['description']?></h4> 
			<h4 class="col-md-11 col-md-offset-1">Date From: <?php echo $destination['date_from']?></h4>
			<h4 class="col-md-11 col-md-offset-1">Date To: <?php echo $destination['date_to']?></h4>
			



			
			<h2 class="col-md-12">Other users' joining the trip</h2>
<?php 
	foreach ($users_trips as $users_trips => $user) {
		if($user['travel_id'] == $destination['id']){
			if($user['user_id'] != $this->session->userdata['user_id']){
				echo "<h4 class='col-md-11 col-md-offset-1'>" . $user['first_name'] . "</h4>";
			}
		}
	}

?>
			

		</div>
	</body>
</html>