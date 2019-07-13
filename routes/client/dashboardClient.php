<?php 
session_start();

$$sessionHolder = $_SESSION['user'];

include '../../php/connectionDb15CACB.php';

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// if(isset($_POST["submitFile"])) {
    
//     $remarks = test_input($_POST['clientRemarks']);

//     $target_dir = "../../uploads/";
//     $target_file = $target_dir . basename($_FILES["clientUploadedFile"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//     if (file_exists($target_file)) {
//         echo "<script type='text/javascript'>alert('Sorry, file already exists. Rename it.');</script>";
//         $uploadOk = 0;
//     }

//     if ($_FILES["clientUploadedFile"]["size"] > 500000) {
//         echo "<script type='text/javascript'>alert('Sorry, your file is too large');</script>";
//         $uploadOk = 0;
//     }

//     if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "pdf") {
//         echo "<script type='text/javascript'>alert('Sorry, only docx, pdf & txt files are allowed.');</script>";
//         $uploadOk = 0;
//     }

//     if ($uploadOk == 0) {
//         echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
//     } else {
//         if (move_uploaded_file($_FILES["clientUploadedFile"]["tmp_name"], $target_file)) {
//             echo "<script type='text/javascript'>alert('Your file ". basename( $_FILES["clientUploadedFile"]["name"]). " has been uploaded.');</script>";
//             // echo "<br>Directory: " . $target_file;
//         } else {
//             echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.');</script>";
//         }
//     }
// } 

?>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>        
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href='../../styles/navbarStyles.css' rel="stylesheet">
        <style>
            .btn-sm {
                padding: 1px 1px !important ;
                font-size: 10px !important ;
                border-radius: 5px !important ;
            }
        </style>
        <!-- <script>
            function loadClientData() {
                var xhttp; 
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("displayData").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "retrieveClientData.php", true);
                xhttp.send();
            }
            
        </script> -->


    </head>

    <body>
        <!-- <form action="?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"> -->
        <form action="../../php/storeClientFile.php" method="post" enctype="multipart/form-data" id="uploadClientFileForm">
            <div class="form-group"><br>
                <label for="fileInput" class="lead">Initiate a new file</label>
                <div class="input-group">
                    <textarea class="form-control" id="remarks" placeholder="Type your remarks, if none type 'None'" type="text" rows="4" name="clientRemarks" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row float-right">
                    <div class="col-auto">
                        <span class='label label-info mt-2 mr-2' id="uploadFileInfo"></span>
                        <label class="btn btn-success" for="myFileSelector">
                            <input id="myFileSelector" type="file" style="display:none" name="clientUploadedFile" onchange="$('#uploadFileInfo').html(this.files[0].name)" required>
                            Upload File
                        </label>
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-success" id="submitFile" name="submitFile" value="Submit">
                    </div>
                </div>
            </div>
        </form>
        <br><br><hr>

        <form>
            <label for="fileInput" class="lead">Initiated Docs</label>
            <div class="sortBy">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group mr-2" role="group">
                        <button type="button" class="btn btn-light btn-sm mr-4 disabled" style="font-weight: 900;">SORT BY</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">ALL</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">PENDING</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">APPROVED</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">DECLINED</button>
                    </div>
                </div>
            </div><br>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Date Registered</th>
                            <th scope="col">ACK Number</th>
                            <th scope="col">Tracking Number</th>
                            <th scope="col">UID</th>
                            <th scope="col">Download 15CACB</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="displayData">
                        <?php
                            $counter = 1;
                            $sql = "SELECT partyName, dateRegistered, ackNumber, trackingNumber, uidNumber, adminUploadedDoc, taskStatus FROM documentStore WHERE userName ='$sessionHolder'";
                            $querySql = mysqli_query($connect, $sql);
                            
                            while ($result = mysqli_fetch_array($querySql)) {
                                echo "<tr>";
                                echo "<th scope='row'>$counter</th>";
                                echo "<td>" . $result['partyName'] . "</td>";
                                echo "<td>" . $result['dateRegistered'] . "</td>";
                                echo "<td>" . $result['ackNumber'] . "</td>";
                                echo "<td>" . $result['trackingNumber'] . "</td>";
                                echo "<td>" . $result['uidNumber'] . "</td>";
                                echo "<td>" . $result['adminUploadedDoc'] . "</td>";
                                echo "<td>" . $result['taskStatus'] . "</td>";
                                echo "</tr>";
                                ++$counter;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    



    <script>
        
    </script>


    </body>
</html>