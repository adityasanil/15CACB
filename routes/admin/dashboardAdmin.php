<?php
error_reporting(0);

$sessionHolder = $_SESSION['user'];

include '../../php/connectionDb15CACB.php';
include '../../php/sendMail.php';

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
    <script type="text/javascript" src="../../scripts/admin.js"></script>

    <style>
        
        table {
            overflow-x: auto;
            white-space: nowrap;
            overflow-y: auto;
            height: auto;
        }
        .tableFixHead    { overflow-y: auto; height: 620px; }
        .tableFixHead th { position: sticky; top: 0; }
        th     { background:#eee; }



    </style>
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
                        <select class='btn btn-light btn-sm selectElement' name="sort" onchange="showTableAdmin(this.value, '<?php echo $sessionHolder; ?>')">
                            <option value="A">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>

                        <div class='ml-3'>
                            <div class="dropright">
                                <input type="text" class="dropdown-toggle form-control" style="" onkeyup="searchClient(this.value)" placeholder="enter the value to search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive tableFixHead">
                <table id="mytable" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="">#</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Date Registered</th>
                            <th scope="col">Client Remarks</th>
                            <th scope="col">ACK Number</th>
                            <th scope="col">TRK Number</th>
                            <th scope="col">UDIN </th>
                            <th scope="col">Remarks</th>
                            <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbspInvoice</th>
                            <th scope="col"><i class="fas fa-arrow-up"></i>&nbsp&nbsp15CB</th>
                            <th scope="col">&nbsp&nbspParty</th>
                            <th scope="col"><i class="fas fa-paper-plane"></i>&nbsp&nbsp15CB</th>
                            <th scope="col"><i class="fas fa-arrow-up"></i>&nbsp&nbspXML</th>
                            <th scope="col"><i class="fas fa-paper-plane"></i>&nbsp&nbspXML</th>
                            <th scope="col">Status 15CB</th>
                            <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbsp15CA</th>
                            <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbsp15CB</th>
                            <th scope="col"><i class="fas fa-arrow-down"></i>&nbsp&nbspXML</th>
                        </tr>
                    </thead>
                    <tbody id="list" class="displayData">
                        <?php

                        $counter = 1;
                        $sql = "SELECT * FROM documentStore WHERE identityUser ='client' ORDER BY submitTime DESC";
                        $querySql = mysqli_query($connect, $sql);

                        while ($result = mysqli_fetch_array($querySql)) {
                            
                            echo "<tr>";
                            echo "<td>$counter</td>";
                            echo "<td>" . $result['firstName'] . " " . $result['lastName'] . "</td>";
                            echo "<td>" . $result['dateRegistered'] . "</td>";

                            echo "<td align='center'><button type='button' class='btn btn- sm btn-light' data-toggle='modal' data-target='#myModal" . $result['trackingNumber'] . "'>
                            Open
                            </button></td>";

                            echo '<div class="modal" id="myModal' . $result['trackingNumber'] . '">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Client remarks</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <p><b>Rate of TDS:</b> ' . $result['tdsRate'] .'</p>
                                            <p><b>Currency in which remittance is made:</b> ' . $result['remittanceCurrency'] .'</p>
                                            <p><b>Nature of remittance:</b> ' . $result['remittanceNature'] .'</p>
                                            <p><b>Purpose code:</b> ' . $result['purposeCode'] .'</p>
                                            <p><b>Please confirm if tax paid is to be grossed up:</b> ' . $result['taxPaid'] .'</p>
                                            <p><b>Is TRC(Tax Residency Certificate) available:</b> ' . $result['trc'] .'</p>
                                            <p><b>Remarks:</b> ' . $result['remarks'] .'</p>                                                                                                                   
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                                </div>';

                            echo "<td><input type='text' name='ackNumber_" . $counter . "' value='" . $result['ackNumber'] . "'></td>";

                            echo "<td>" . $result['trackingNumber'] . "</td>";
                            echo "<td><input type='text' name='uidNumber_" . $counter . "' value='" . $result['uidNumber'] . "'></td>";
                            echo "<td><input type='text' name='adminRemarks_" . $counter . "' value='" . $result['adminRemarks'] . "'></td>";

                            echo "<td align='center'><a href='" . $result['clientUploadedDoc'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
                            echo "<td align='center'>
                                        <label for='fileUpload" . $counter . "'>
                                            <i class='fas fa-upload fa-lg'></i>
                                        </label>
                                        <input id='fileUpload" . $counter . "' name='fileFinal_" . $counter . "' type='file' style='display:none;'>
                                        <input type='hidden' name='fileID_" . $counter . "' value='" . $result['trackingNumber'] . "'>
                                    </td>
                                    <script>
                                        $('#fileUpload" . $counter . "').change(function() {
                                            var i = $(this).prev('label').clone();
                                            var file = $('#fileUpload" . $counter . "')[0].files[0].name;
                                            $(this).prev('label').text(file);
                                        });
                                    </script>
                                    ";

                            echo "<td><input type='text' name='partyName_" . $counter . "' value='" . $result['partyName'] . "'></td>";

                            echo "<td align='center'><input type='submit' class='btn btn-success btn-sm mb-1' name='submitFinal_" . $counter . "'></td>";

                             if($result['clientUploadedDoc'] == true) {
                                    echo "<td align='center'>
                                    <label for='fileUploadAdminXML" . $counter . "'>
                                        <i class='fas fa-upload fa-lg' style='color: #5bc0de'></i>
                                    </label>
                                    <input id='fileUploadAdminXML" . $counter ."' form='storeAdminXML' name='fileAdminFileXML_". $result['trackingNumber']."' type='file' style='display:none;'>
                                    <input type='hidden' name='fileAdminIDXML_".$counter."' form='storeAdminXML' value='" . $result['trackingNumber'] . "'>
                                </td>
                                <script>
                                    $('#fileUploadAdminXML" . $counter . "').change(function() {
                                        var i = $(this).prev('label').clone();
                                        var file = $('#fileUploadAdminXML" . $counter . "')[0].files[0].name;
                                        $(this).prev('label').text(file);
                                    });
                                </script>
                                ";
                                echo "<td align='center'><input type='submit' class='btn btn-success btn-sm' form='storeAdminXML' name='submitAdminXML_" . $counter . "'></td>";
                            }



                            echo "<td align='center'><img class='statusLogo' src='" . $result['taskStatus'] . "'></td>";
                            if ($result['clientUp15CA'] == true) {
                                echo "<td align='center'><a href='" . $result['clientUp15CA'] . "' download><i class='fas fa-download fa-lg' style='color: #d9534f;'></i></a></td>";
                            } else {
                                echo "<td></td>";
                            }

                            if ($result['adminUploadedDoc'] != null) {
                                echo "<td align='center'>" . $result['adminUploadedDoc'] . "</td>";
                            } else {
                                echo "<td></td>";
                            }

                            if($result['adminXML'] != null){
                            echo "<td align='center'><a href='" . $result['adminXML'] . "' download><i class='fas fa-download fa-lg'></i></a></td>";
                            } else {
                                echo "<td></td>";
                            }
                            echo "</tr>";
                            ++$counter;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
        <form action="../../php/storeAdminXML.php" id='storeAdminXML' enctype="multipart/form-data" method="post"></form>
    </div><br><br>
</body>

</html>