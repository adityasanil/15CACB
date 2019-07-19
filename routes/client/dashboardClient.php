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
        <script>
        function showTable(str, holder) {
            var xhttp;
            if (str == "") {
                document.getElementById("displayData").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("displayData").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../../php/getTableClient.php?holder=" + holder + "&orderBy=" + str, true);
            xhttp.send();
        }
    </script>
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
                        <select  class='btn btn-light btn-sm selectElement' name="sort" onchange="showTable(this.value, '<?php echo $sessionHolder; ?>')">
                            <option value="A">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed ">Completed</option>
                        </select>
                    </div>
                </div>
            </div><br>

            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="">#</th>
                            <!-- <th scope="col">Party Name</th> -->
                            <th scope="col">Date Registered</th>
                            <th scope="col">ACK Number</th>
                            <th scope="col">Tracking Number</th>
                            <th scope="col">UIDN</th>
                            <th scope="col">Status 15CB</th>
                            <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbsp15CB</th>
                            <th scope="col"><i class="fas fa-arrow-up"></i>&nbsp&nbsp15CA</th>
                            <th scope="col">Send</th>
                            <th scope="col">Status 15CA</th>
                            <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbsp15CA</th>
                        </tr>
                    </thead>
                    <tbody id="displayData">
                        <?php
                            $counter = 1;
                            $sql = "SELECT submitTime, partyName, dateRegistered, ackNumber, trackingNumber, uidNumber, adminUploadedDoc, taskStatus FROM documentStore WHERE userName ='$sessionHolder' ORDER BY submitTime DESC";
                            $querySql = mysqli_query($connect, $sql);
                            
                            while ($result = mysqli_fetch_array($querySql)) {
                                echo "<tr>";
                                echo "<th scope='row'>$counter</th>";
                                // echo "<td>" . $result['partyName'] . "</td>";
                                echo "<td>" . $result['dateRegistered'] . "</td>";
                                echo "<td>" . $result['ackNumber'] . "</td>";
                                echo "<td>" . $result['trackingNumber'] . "</td>";
                                echo "<td>" . $result['uidNumber'] . "</td>";
                                echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
                                echo "<td align='center'>".$result['adminUploadedDoc']."</td>";
                                echo "<td align='center'>
                                        <label for='fileUpload15CA" . $counter . "'>
                                            <i class='fas fa-upload fa-lg'></i>
                                        </label>
                                        <input id='fileUpload15CA" . $counter ."' name='clientUp15CA_".$result['trackingNumber']."' type='file' style='display:none;'>
                                        <input type='hidden' name='fileID15CA_".$counter."' value='" . $result['trackingNumber'] . "'>
                                    </td>
                                    <script>
                                        $('#fileUpload15CA" . $counter . "').change(function() {
                                            var i = $(this).prev('label').clone();
                                            var file = $('#fileUpload15CA" . $counter . "')[0].files[0].name;
                                            $(this).prev('label').text(file);
                                        });
                                    </script>
                                    ";
                                echo "<td><input type='submit' class='btn btn-success btn-sm' name='submitFinal_" . $counter . "'></td>";
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