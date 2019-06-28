<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "user";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
 	{
    	die("Connection failed" .$conn->connect_error);
	}


$first_name = $_POST['firstName'];
 
$last_name = $_POST['lastName'];
 
$add = $_POST['address'];
 
$email = $_POST['email'];
 
$pan = $_POST['panNumber'];

$contact = $_POST['contactNumber'];

$company_name = $_POST['companyName'];

$gst = $_POST['gstNumber'];

$ifsc = $_POST['codeIFSC'];

$swift = $_POST['codeSWIFT'];

$acc_no = $_POST['accountNumber'];



$sql = "INSERT INTO info (fname, lname, address, email, pan, contact, company, gst, ifsc, swift, acoount_no ) VALUES ('$first_name', '$last_name', '$add', '$email', '$pan', '$contact', '$company_name', '$gst', '$ifsc', '$swift', '$acc_no')";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>