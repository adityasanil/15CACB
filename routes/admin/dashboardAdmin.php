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
        <style>
            table {
                overflow-x: auto;
                white-space: nowrap;
            }
        </style>
        <script>
        function showTableAdmin(str, holder) {
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
            xhttp.open("GET", "../../php/getTableAdmin.php?holderAdmin=" + holder + "&orderByAdmin=" + str, true);
            xhttp.send();
        }
    </script>
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
                            <select  class='btn btn-light btn-sm selectElement' name="sort" onchange="showTableAdmin(this.value, '<?php echo $sessionHolder; ?>')">
                                <option value="A">All</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="">#</th>
                                <th scope="col">Party Name</th>
                                <th scope="col">Date Registered</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">ACK Number</th>
                                <th scope="col">TRK Number</th>
                                <th scope="col">UIDN </th>
                                <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbspInvoice</th>
                                <th scope="col"><i class="fas fa-arrow-up"></i>&nbsp&nbsp15CB</th>
                                <th scope="col"><i class="fas fa-paper-plane"></i>&nbsp&nbsp15CB</th>
                                <th scope="col">Status 15CB</th>
                                <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbsp15CA</th>
                                <th scope="col"><i class="fas fa-arrow-up"></i>&nbsp&nbsp15CA</th>
                                <th scope="col"><i class="fas fa-paper-plane"></i>&nbsp&nbsp15CA</th>
                                <th scope="col">Status 15CA</th>
                            </tr>
                        </thead>
                        <tbody id="displayData">
                            <?php
                                $counter = 1;
                                $sql = "SELECT * FROM documentStore WHERE identityUser ='client' ORDER BY submitTime DESC";
                                $querySql = mysqli_query($connect, $sql);
                                
                                while ($result = mysqli_fetch_array($querySql)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>$counter</th>";
                                    echo "<td>" . $result['firstName'] . " " .$result['lastName'] . "</td>";
                                    echo "<td>" . $result['dateRegistered'] . "</td>";
                                    echo "<td><button type='button' data-container='body' class='btn btn-outline-light btn-sm' style='color: black;' data-toggle='tooltip' data-placement='left' title='". $result['remarks'] . "'>
                                    Remark
                                    </button></td>";

                                    echo "<td><input type='text' name='ackNumber_" . $counter . "' value='" . $result['ackNumber'] . "'></td>";
                                    
                                    echo "<td>" . $result['trackingNumber'] . "</td>";
                                    echo "<td><input type='text' name='uidNumber_" . $counter . "' value='" . $result['uidNumber'] . "'></td>";
                                    echo "<td align='center'><a href='" . $result['clientUploadedDoc'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
                                    echo "<td align='center'>
                                        <label for='fileUpload" . $counter . "'>
                                            <i class='fas fa-upload fa-lg'></i>
                                        </label>
                                        <input id='fileUpload" . $counter ."' name='fileFinal_".$counter."' type='file' style='display:none;'>
                                        <input type='hidden' name='fileID_".$counter."' value='" . $result['trackingNumber'] . "'>
                                    </td>
                                    <script>
                                        $('#fileUpload" . $counter . "').change(function() {
                                            var i = $(this).prev('label').clone();
                                            var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                                            $(this).prev('label').text(file);
                                        });
                                    </script>
                                    ";
                                    echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' name='submitFinal_" . $counter . "'></td>";
                                    echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus'] . "'></td>";
                                    if($result['clientUp15CA'] == true) {
                                        echo "<td align='center'><a href='" . $result['clientUp15CA'] . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a></td>";
                                        echo "<td align='center'>
                                        <label for='fileUploadAdmin15CA" . $counter . "'>
                                            <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                                        </label>
                                        <input id='fileUploadAdmin15CA" . $counter ."' form='storeAdmin15CA' name='fileAdminFile15CA_". $result['trackingNumber']."' type='file' style='display:none;'>
                                        <input type='hidden' name='fileAdminID15CA_".$counter."' form='storeAdmin15CA' value='" . $result['trackingNumber'] . "'>
                                    </td>
                                    <script>
                                        $('#fileUploadAdmin15CA" . $counter . "').change(function() {
                                            var i = $(this).prev('label').clone();
                                            var file = $('#fileUploadAdmin15CA" . $counter . "')[0].files[0].name;
                                            $(this).prev('label').text(file);
                                        });
                                    </script>
                                    ";
                                    echo "<td align='center'><input type='submit' class='btn btn-success btn-sm submitBtnTable mb-1' form='storeAdmin15CA' name='submitAdmin15CA_" . $counter . "'></td>";
                                    echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
                                    } else {
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                    }

                                    // echo "<td align='center'>
                                    //     <label for='fileUploadAdmin15CA" . $counter . "'>
                                    //         <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                                    //     </label>
                                    //     <input id='fileUploadAdmin15CA" . $counter ."' form='storeAdmin15CA' name='fileAdminFile15CA_". $result['trackingNumber']."' type='file' style='display:none;'>
                                    //     <input type='hidden' name='fileAdminID15CA_".$counter."' form='storeAdmin15CA' value='" . $result['trackingNumber'] . "'>
                                    // </td>
                                    // <script>
                                    //     $('#fileUploadAdmin15CA" . $counter . "').change(function() {
                                    //         var i = $(this).prev('label').clone();
                                    //         var file = $('#fileUploadAdmin15CA" . $counter . "')[0].files[0].name;
                                    //         $(this).prev('label').text(file);
                                    //     });
                                    // </script>
                                    // ";
                                    // echo "<td align='center'><input type='submit' class='btn btn-success btn-sm' form='storeAdmin15CA' name='submitAdmin15CA_" . $counter . "'></td>";
                                    // echo "<td align='center'><img class='statusLogo' src='".$result['taskStatus15CA'] . "'></td>";
                                    echo "</tr>";
                                    ++$counter;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <form action="../../php/storeAdmin15CA.php" id='storeAdmin15CA' enctype="multipart/form-data" method="post"></form>

        </div>
        
    

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>