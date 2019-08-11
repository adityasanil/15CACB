<?php 

session_start();
$sessionHolder = $_SESSION['user'];
include 'connectionDb15CACB.php';

$counter = 1;
$queryAdminList = mysqli_query($connect, "SELECT * FROM Users WHERE identity = 'admin'");

while($admin = mysqli_fetch_array($queryAdminList)) {

	echo "<tr>";
	echo "<td>" . $counter . "</td>";
	echo "<td>" . $admin['userName'] . "</td>";
	echo "<td>" . $admin['firstName'] . " " . $admin['lastName'] . "</td>";
	echo "<td><a href='mailto:" . $admin['email'] . "'>" . $admin['email'] . "</td>";
	echo "<td>" . $admin['contact'] . "</td>";
	echo "<td>" . $admin['addedBy'] . "</td>";
	echo "</tr>";
	++$counter;
}

?>