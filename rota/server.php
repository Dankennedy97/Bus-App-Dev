<?php
	session_start();
	//string session_id ([ string $player_id ] );

	$username = "";
	$email = "";
	$pass = "";
	$errors = array();



	//connect to the database files
	$db = mysqli_connect('localhost', 'root', '', 'rota');

	//When the register button is clicked
	if (isset($_POST['register'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password1 = mysqli_real_escape_string($db,$_POST['password1']);

		//Make sure all the fields are filled out
		if(empty($username)){
			array_push($errors, "Username is required");
		}
		if(empty($email)){
			array_push($errors, "Email is required");
		}
		if(empty($password)){
			array_push($errors, "Password is required");
		}
		if($password != $password1){
			array_push($errors, "The two passwords dont match!");
		}

		//if no errors save user to database
		if(count($errors) == 0){
			$password = md5($password); //encrypts the password
			$sql = "INSERT INTO users (username, email, password)
							VALUES ('$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in!";
			header('location: profile.php'); //redirects to home page
		}
	}

/*$username = $_POST['username'];
	$password = $_POST['password'];

	// prevent injection
	//$username = stripcslashes($username);
//	$password = stripcslashes($password);
	//$username = mysqli_real_escape_string($username);
	//$password = mysqli_real_escape_string($password);

	//connec to the server
	//mysqli_connect("localhost","root", "");
	//mysqli_select_db("login");

	//query the database for users
	$result = mysqli_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'")
		or die("failed to query database".mysql_error());
	$row = mysqli_fetch_array($result);
	if($row['username'] == $username && $row['password'] == $password){
		echo "Login success!!! Welocme" .$row['$username'];
	}else{
		echo"Please Enter the correct password/username";
	} */

	//log in the user
//	if (isset($_POST['login'])){
	//	$username = mysqli_real_escape_string($db,$_POST['username']);
		//$password = mysqli_real_escape_string($db,$_POST['password']);

		//Make sure all the fields are filled out
		//if(empty($username)){
			//array_push($errors, "Username is required");
		//}
		//if(empty($password)){
		//	array_push($errors, "Password is required");
		//}



		if (count($errors) == 0){
			$password = md5($password);//encrypts password before comparison
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) == 1){
				//log in user
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['success'] = "You are now logged in!";
				header('location: profile.php'); //redirects to home page
			}
			/*else{
				array_push($errors, "Wrong username or password!");
			}*/
		}

	//uploading the image once user hits the submit button called Submit1

		if(isset($_POST['Submit1']))
		{
			$username = mysqli_real_escape_string($db,$_SESSION['username']);
			//creates path
			$filepath = "assests/img/" . $_FILES["file"]["name"];

			if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
			{

				$sqli = "	UPDATE users
							SET picture= ('{$filepath}')
							WHERE username='$username'";
				//adding data to db
				if ($db->query($sqli) === TRUE){
					echo "New record created successfully";
				}else{
					echo "Error: " . $sqli . "<br>" . $db->error;
				}

			}else{
				echo "Error !!";
			}
		}


	//to logout
	if(isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php');
	}

?>
