<?php 
session_start();
$$sessionHolder = $_SESSION['user'];

include '../../php/connectionDb15CACB.php';


?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>        
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href='../../styles/navbarStyles.css' rel="stylesheet">
    </head>

    <body>
        <br>
        <div class="container">
            <form action="../../php/storeAdminFile.php" method="post" enctype="multipart/form-data">
                <label for="fileInput" class="lead">Initiated Docs</label>
                <div class="sortBy">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group mr-2" role="group">
                            <button type="button" class="btn btn-light btn-sm mr-4 disabled" style="font-weight: 900;">SORT BY</button>
                            <button type="button" class="btn btn-light btn-sm mr-3 active">ALL</button>
                            <button type="button" class="btn btn-light btn-sm mr-3">PENDING</button>
                            <button type="button" class="btn btn-light btn-sm mr-3">APPROVED</button>
                            <button type="button" class="btn btn-light btn-sm mr-3">DECLINED</button>
                        </div>
                    </div>
                </div>
                <br>

                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="">#</th>
                                <th scope="col">Party Name</th>
                                <th scope="col">Date Registered</th>
                                <th scope="col">ACK Number</th>
                                <th scope="col">Tracking Number</th>
                                <th scope="col">UIDN </th>
                                <th scope="col">Download 15CA</th>
                                <th scope="col">Upload 15CACB</th>
                                <th scope="col">Send</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="displayData">
                            <?php
                                $counter = 1;
                                $sql = "SELECT firstName, lastName, dateRegistered, ackNumber, trackingNumber, uidNumber, clientUploadedDoc, taskStatus FROM documentStore WHERE identity ='client'";
                                $querySql = mysqli_query($connect, $sql);
                                
                                while ($result = mysqli_fetch_array($querySql)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>$counter</th>";
                                    echo "<td>" . $result['firstName'] . " " .$result['lastName'] . "</td>";
                                    echo "<td>" . $result['dateRegistered'] . "</td>";
                                    echo "<td>" . $result['ackNumber'] . "</td>";
                                    echo "<td>" . $result['trackingNumber'] . "</td>";
                                    echo "<td>" . $result['uidNumber'] . "</td>";
                                    echo "<td><a href=" . $result['clientUploadedDoc'] . " download>Download</a></td>";
                                    echo "<td>
                                        <label for='fileUpload" . $counter . "'>
                                            <i class='fa fa-cloud-upload'></i>Upload
                                        </label>
                                        <input id='fileUpload" . $counter ."' name='fileFinal".$counter."' type='file' style='display:none;'>
                                        <input type='hidden' name='fileID".$counter."' value='" . $result['trackingNumber'] . "'>
                                    </td>
                                    <script>
                                        $('#fileUpload" . $counter . "').change(function() {
                                            var i = $(this).prev('label').clone();
                                            var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                                            $(this).prev('label').text(file);
                                        });
                                    </script>
                                    ";
                                    echo "<td><input type='submit' class='btn btn-success btn-sm' name='submitFinal" . $counter . "'></td>";
                                    echo "<td>" . $result['taskStatus'] . "</td>";
                                    echo "</tr>";

                                    ++$counter;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        
    


    </body>
</html>