<?php


include 'connectionDb15CACB.php';

if($_POST['info1']!=null) {

    $info1 = $_POST['info1'];
    $info2 = $_POST['info2'];
    $info3 = $_POST['info3'];
    $info4 = $_POST['info4'];
    $info5 = $_POST['info5'];
    $username = $_POST['username'];

    

    $sql = "UPDATE `personaldetails`
            SET `info1`='$info1', `info2`='$info2', `info3`='$info3',`info4`='$info4',`info5`='$info5'
            WHERE `username`= '$username'"; 


    //$sql = "insert into personaldetails(info1, info2, info3, info4 , info5) Values('$info1', '$info2',  '$info3', '$info4', '$info5')";
       
    if (mysqli_query($connect, $sql)){
        echo "Details added successfully";    
    }

    else {
       echo "Error updating record: " . mysqli_error($connect);

    }


}
?>
