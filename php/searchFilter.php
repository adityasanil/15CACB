<?php 

include 'connectionDb15CACB.php';

if($_GET['value'] != null) {

	$name = $_GET['value'];
	$sql = "SELECT firstName, lastName FROM Users WHERE firstName LIKE '$name%' OR lastName LIKE '$name%' LIMIT 5";
	$query = mysqli_query($connect, $sql);

	while($result = mysqli_fetch_array($query)) {

	    echo "<button class='dropdown-item' type='button'>" . $result['firstName'] . " " . $result['lastName'] . "</button>";
	}


}
?>