<?php
session_start();
$sessionHolder = $_SESSION['user'];
include 'connectionDb15CACB.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(!$_POST['userName'] == null) {
	
	$id = uniqid(rand(1000,9999));
	$firstName = test_input($_POST['firstName']);
	$lastName = test_input($_POST['lastName']);
	$userName = test_input($_POST['userName']);
	$contactNumber = test_input($_POST['contactNumber']);
	$email = test_input($_POST['email']);
	$identity = 'admin';
	$addedBy = $sessionHolder;
	$passToHash = test_input($_POST['password']);
	$passwordHash = password_hash($passToHash, PASSWORD_DEFAULT);

	$searchAdmin = mysqli_query($connect, "SELECT * FROM Users WHERE userName = '$userName' AND identity = 'admin'");

	if(mysqli_num_rows($searchAdmin) > 0) {

		echo "Admin with similar username already exists!";

	} else {

		$sql = "INSERT INTO Users (`id`, `firstName`, `lastName`, `userName`, `password`, `identity`, `email`, `contact`, `addedBy`) VALUES 
		        ('$id', '$firstName', '$lastName', '$userName','$passwordHash', '$identity', '$email', '$contactNumber', '$addedBy')";
		mysqli_query($connect, $sql);
		echo "New admin added!";
	}


}

?>