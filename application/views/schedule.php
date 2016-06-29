<?php 
	// var_dump($this->session->all_userdata()); 
	// $user_level = $this->session->userdata('user_level');

	// $session = $this->session->userdata('is_logged_in');
	// if ($session == FALSE) {
	// 	redirect("/users/signin");
	// }

// var_dump($this->session->all_userdata());
// echo "<br>";
// var_dump($this->session->userdata('users_trips'));
// var_dump($this->session->userdata('travels_trips'));
$users_trips = $this->session->userdata('users_trips');
$travels_trips = $this->session->userdata('travels_trips');

?>

<html>
	<head>
		<title>Travel Dashboard</title>

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
			      	<a href="/users/logout" class="btn btn-danger">Sign Out</a>
			    </div>
			  </div>
			</nav>
		</header>
		<div class="container">


			<h2>Hello <?php echo $this->session->userdata('user_first_name') ?></h2>
			


			<h3>Your Trip Schedules</h3> 



			
			<table class="table">
				<thead>
					<th>Destination</th>
					<th>Travel Start Date</th>
					<th>Travel End Date</th>

					<th>Plan</th>

					
				</thead>
				<tbody>

					
<?php
	foreach ($travels_trips as $travel_trip => $travel) {
?>
					<tr>
<?php
		if ($travel['user_id'] == $this->session->userdata('user_id')){


?>


						
						<td><a href="/travels/destination/<?php echo $travel['travel_id'] ?>"</a><?php echo $travel['destination'] ?></td>
						<td><?php echo $travel['date_from'] ?></td>
						<td><?php echo $travel['date_to'] ?></td>
						<td><?php echo $travel['description'] ?></td>

<?php
		}
?>
					</tr>
<?php
	}

?>

						
							
					



				</tbody>
			</table>





<h3>Other User's Travel Plans</h3> 

			
			<table class="table">
				<thead>
					<th>Name</th>
					<th>Destination</th>
					<th>Travel Start Date</th>
					<th>Travel End Date</th>
					<th>Do You Want to Join?</th>

					
				</thead>
				<tbody>

					

<?php
	foreach ($travels_trips as $travel_trip => $travel) {
?>
					<tr>
<?php

		if ($travel['user_id'] != $this->session->userdata('user_id')){
			foreach ($users_trips as $user_trip => $user) {
				
				if($user['user_id'] == $travel['user_id']){
					
			
?>
					
						<td>
							<?php echo $user['first_name'] . ' ' . $user['last_name'] ?>
						</td>
<?php
				}
			} 
?>

						<td><a href="/travels/destination/<?php echo $travel['travel_id'] ?>"><?php echo $travel['destination'] ?></a></td>
						<td><?php echo $travel['date_from'] ?></td>
						<td><?php echo $travel['date_to'] ?></td>
						<td><a href="/trips/add/<?php echo $travel['travel_id'] ?>">Join</a></td>
<?php 
		}
?>
					</tr>
<?php
	}
?>
					





				</tbody>
			</table>

			<div class="text-right">
				<a href="/users/add"><h3>Add Travel Plan</h3></a>
			</div>


		</div>
	</body>
</html>