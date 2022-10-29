<?php

session_start();

if(!isset($_SESSION["is_login"])) {
	header('Location: login.php');	
}
$emailInput = $_POST['emailId'];

include('connection.php');

if(!empty(isset( $emailInput )) && isset( $emailInput )){
   checkEmail($conn, $emailInput);
}

function checkEmail($conn, $emailInput){
 	$query = "SELECT email FROM users WHERE email='$emailInput'";
 	$result = $conn->query($query);
 	
 	if ($result->num_rows > 0) {
		echo "false";
    }
    else{
    	echo "true";
    }
}

mysqli_close($conn);

?>