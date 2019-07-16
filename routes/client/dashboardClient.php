<?php 
session_start();
$$sessionHolder = $_SESSION['user'];

include '../../php/connectionDb15CACB.php';


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
            .statusLogo {
                height: 20px;
            }
            .fas {
                color: green;
            }
        </style>
    </head>

    <body>
        <form action="../../php/storeClientFile.php" method="post" enctype="multipart/form-data" id="uploadClientFileForm">
            <div class="form-group"><br>
                <label for="fileInput" class="lead">Initiate Invoice file</label>
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
                            Upload file
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
                        <button type="button" class="btn btn-light btn-sm mr-3 active">ALL</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">PENDING</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">APPROVED</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">DECLINED</button>
                    </div>
                </div>
            </div><br>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="">#</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Date Registered</th>
                            <th scope="col">ACK Number</th>
                            <th scope="col">Tracking Number</th>
                            <th scope="col">UIDN </th>
                            <th scope="col">Status 15CB</th>
                            <th scope="col">Get 15CB</th>
                            <!-- <th scope="col">Upload 15CA</th> -->
                            <!-- <th scope="col">Status 15CA</th> -->
                            <!-- <th scope="col">Get 15CA</th> -->

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
                                echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
                                // echo "<td align='center'><i class='fas fa-ellipsis-h fa-2x'></i></td>";
                                echo "<td align='center'><a href=" . $result['adminUploadedDoc'] . " download><i class='fas fa-download fa-lg'></i></a></td>";
                                echo "</tr>";
                                ++$counter;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>



    </body>
</html>