<?php
include "connectionDb15CACB.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$identity = "client";
$address = $_POST['address'];
$email = $_POST['email'];
$panNumber = $_POST['panNumber'];
$contact = $_POST['contactNumber'];
$companyName = $_POST['companyName'];
$gstNumber = $_POST['gstNumber'];
$codeIFSC = $_POST['codeIFSC'];
$codeSWIFT = $_POST['codeSWIFT'];
$accountNumber = $_POST['accountNumber'];


$sql = "INSERT INTO info (`fname`, `lname`, `identity`, `addr`, `email`, `pan`, `contact`, `company`, `gst`, `ifsc`, `swift`, `acoount_no` ) VALUES ('$firstName', '$lastName', '$identity', '$address', '$email', '$panNumber', '$contact', '$companyName', '$gstNumber', '$codeIFSC', '$codeSWIFT', '$accountNumber')";

if (mysqli_query($connect, $sql)) {
    echo "New records created successfully";
}
else {
	echo "Unable to add Details! Error: " . mysqli_error($connect);
}

?>