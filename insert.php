<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$department = $_POST['department'];
$pos = $_POST['pos'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($first_name) || !empty($last_name) || !empty($department) || !empty($pos) || !empty($email) || !empty($password)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "OnlineRoster";

    //connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }

    else {
      $SELECT = "SELECT email From Employee Where email = ? Limit 1";
      $INSERT = "INSERT Into Nurse (first_name, last_name, department, pos, email, password) values(?,?,?,?,?,?)";
      $conn->close();
      }
    }
}

else {
  echo "All fields are required";
  die();
}

 ?>
