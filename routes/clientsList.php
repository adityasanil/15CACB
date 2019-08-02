<?php 

session_start();
$sessionHolder=$_SESSION['user'];

include 'php/connectionDb15CACB.php';


?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>List Clients</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <br>
        <div class="container">
            <h3>Client list</h3>
        </div>
        <br>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <!-- <th scope="col">Address</th> -->
                            <th scope="col">Company</th>
                            <th scope="col">PAN</th>
                            <th scope="col">GST</th>
                            <th scope="col">IFSC</th>
                            <th scope="col">SWIFT</th>
                            <th scope="col">Bank Acc.</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $number = 1;
                        $getClientList = "SELECT Users.firstName, Users.lastName, Users.email,  Users.contact, personaldetails.*
                        FROM Users , personaldetails 
                        WHERE Users.id = personaldetails.id ORDER BY Users.firstName ASC";

                        $queryGetClientList = mysqli_query($connect, $getClientList);

                        while ($client = mysqli_fetch_array($queryGetClientList)) {
                            echo "<tr>";
                            echo "<th>". $number . "</th>";
                            echo "<td>" . $client['firstName'] . " " . $client['lastName'] . "</td>";
                            echo "<td>" . $client['username'] . "</td>";
                            echo "<td><a href='mailto:" . $client['email'] . "'>" . $client['email'] . "</a></td>";
                            echo "<td>" . $client['contact'] . "</td>";
                            // echo "<td>" . $client['address'] . "</td>";
                            echo "<td>" . $client['companyName'] . "</td>";
                            echo "<td>" . $client['panNumber'] . "</td>";
                            echo "<td>" . $client['gstNumber'] . "</td>";
                            echo "<td>" . $client['ifscCode'] . "</td>";
                            echo "<td>" . $client['swiftCode'] . "</td>";
                            echo "<td>" . $client['accountNumber'] . "</td>";
                            echo "</tr>";
                            $number++;
                        }   
                    ?>
                    </tbody>
                </table>
            </div>
        </div>



    </body>
</html>