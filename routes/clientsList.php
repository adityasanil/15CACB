<?php

session_start();
$sessionHolder = $_SESSION['user'];

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
            <table class="table table-hovered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total transactions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $number = 1;
                    $getClientList = "SELECT Users.userName, Users.id, Users.identity, Users.firstName, Users.lastName, Users.email,  Users.contact, personaldetails.*
                    FROM Users , personaldetails
                    WHERE Users.id = personaldetails.id AND Users.identity= 'client' ORDER BY Users.firstName ASC";

                    $queryGetClientList = mysqli_query($connect, $getClientList);

                    while ($client = mysqli_fetch_array($queryGetClientList)) {
                        echo "<tr>";
                        echo "<th>" . $number . "</th>";
                        echo "<td><a class='client_data' href='#' id='" . $client['id'] . "'>" . $client['firstName'] . " " . $client['lastName'] . "</td>";
                        echo "<td>" . $client['userName'] . "</td>";
                        echo "<td><a href='mailto:" . $client['email'] . "'>" . $client['email'] . "</a></td>";

                        $sql = "SELECT * FROM documentStore WHERE userName = '" . $client['userName'] . "'";
                        $count = mysqli_query($connect, $sql);
                        $countTranscation = mysqli_num_rows($count);
                        echo "<td>" . $countTranscation . "</td>";
                        echo "</tr>";
                        $number++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="clientModal" class="modal">
        <div class="modal-dialog modal-xs modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Client Details</h4>
                </div>
                <div class="modal-body" id="client_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.client_data').click(function() {
                var client_id = $(this).attr("id");
                $.ajax({
                    url: "../../php/fetchClientDetails.php",
                    method: "post",
                    data: {
                        client_id: client_id
                    },
                    success: function(data) {
                        $('#client_detail').html(data);
                        $('#clientModal').modal("show");
                    }
                });
            });
        });
    </script>



</body>

</html>