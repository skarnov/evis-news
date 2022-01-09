<?php

if(isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    //move_uploaded_file($post_image_tmp, "../images/{$post_image}");

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, password) ";

    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$password}')";

    $create_user_query = $connection->query($query);

    confirmQuery($create_user_query);

    echo "User Created: " . "<a href='users.php'>View Users</a>";

}


 ?>




<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="post_title">Fristname</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="post_title">Lastname</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>


	<div class="form-group">
		<select id="" name="user_role" class="form-control">
			<option value="subscriber">Select Options</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>



	<div class="form-group">
		<label for="post_author">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for="post_status">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control">
	</div>


	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
	</div>




</form>
