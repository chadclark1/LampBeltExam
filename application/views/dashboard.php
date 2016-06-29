<?php 
	// var_dump($this->session->all_userdata()); 
	// $user_level = $this->session->userdata('user_level');

	$session = $this->session->userdata('is_logged_in');
	if ($session == FALSE) {
		redirect("/users/signin");
	}
	// var_dump($items);
	$current_user = $this->session->all_userdata();
	// var_dump($current_user);
	$users = $this->session->userdata('users');
	// var_dump($this->session->all_userdata());
	var_dump($users);
?>

<html>
	<head>
		<title>Wishlist Dashboard</title>

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
			      	<a href="/users/logout" class="btn btn-danger">Sign Out</a>
			    </div>
			  </div>
			</nav>
		</header>
		<div class="container">


			<h2>Hello <?php echo $this->session->userdata('user_first_name') ?></h2>
			


			<h3>Your Wishlist</h3> 



			
			<table class="table">
				<thead>
					<th>Item</th>
					<th>Added By</th>
					<th>Date Added</th>

					<th>Action</th>

					
				</thead>
				<tbody>

<?php 
	foreach ($items as $item) {
		if($item['user_id'] === $current_user['user_id']){


	
?>				
					<tr>
						<td><a href="/items/profile/<?php echo $item['id'] ?>"</a><?php echo $item['description'] ?></td>
<?php
			foreach ($users as $user) {
				if($item['created_by'] === $user['id']){
?>
						<td><?php echo $user['first_name'] ?></td>
<?php
					break;
				}
				
			}
?>
						

						<td><?php echo $item['date_added'] ?></td>
<?php 
						if($item['created_by'] === $current_user['user_id']){
							// echo $item['created_by'] . ' ' . $current_user['user_id'] . "<br><br>";
?>
							<td><a href="/items/delete/<?php echo $item['id'] ?>">Delete</a></td>
<?php
						} else {
?>
						<td><a href="/users_items/remove/<?php echo $item['id'] ?>">Remove from my Wishlist</a></td>
<?php 
						}
?>

					</tr>
<?php 
		}
	}
	
?>

						
							
					



				</tbody>
			</table>





<h3>Other User's Wish List</h3> 

			
			<table class="table">
				<thead>
					<th>Item</th>
					<th>Added By</th>
					<th>Date Added</th>
					<th>Action</th>

					
				</thead>
				<tbody>
<?php 
	foreach ($items as $item) {
		if($item['user_id'] != $current_user['user_id']){


	
?>	
					<tr>

					
						<td><a href="/items/profile/<?php echo $item['id'] ?>"</a><?php echo $item['description'] ?></td>

<?php
			foreach ($users as $user) {
				if($item['created_by'] === $user['id']){
?>
						<td><?php echo $user['first_name'] ?></td>
<?php
					break;
				}
				// break;
			}
?>
						<td><?php echo $item['date_added'] ?></td>
						<td><a href="/users_items/add/<?php echo $item['id'] ?>">Add to my Wishlist</a></td>

					</tr>
<?php 
	}
}
?>


				</tbody>
			</table>

			<div class="text-right">
				<a href="/items/add"><h3>Add Item</h3></a>
			</div>


		</div>
	</body>
</html>