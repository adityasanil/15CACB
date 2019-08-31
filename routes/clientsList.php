<?php

$sessionHolder = $_SESSION['user'];

include '../../php/connectionDb15CACB.php';


?>


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List Clients</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script> 
       function addDetails(a, b, c, d, e, f){

            var info1 = a;
            var info2 = b;
            var info3 = c;
            var info4 = d;
            var info5 = e;
            var username = f;
			
			var xhttpObj = new XMLHttpRequest();


			if (info1.length == 0 || info2.length == 0 || info3.length == 0 || info4.length == 0 || info5.length == 0) {
				window.alert("Please fill all the fields to add Details");
            }
            else {
				xhttpObj.open("POST", "../../php/addAdditionalDetails.php", true);
				xhttpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttpObj.send("info1="+info1+"&info2="+info2+"&info3="+info3+"&info4="+info4+"&info5="+info5+"&username="+username);

				xhttpObj.onreadystatechange = function() {
	                if (this.readyState === 4 && this.status === 200) {
	                	window.alert(this.responseText);
	                	//showDetails();
	                }
	            };
        	}
		}

		function showDetails() {
			var xhttpObj2;
            xhttpObj2 = new XMLHttpRequest();
            xhttpObj2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("clientDetails").innerHTML = this.responseText;
                }
            };
            xhttpObj2.open("GET", "../../php/fetchClientDetails.php", true);
            xhttpObj2.send();
		}

        function refreshPage(){

                window.location.reload();
            }
 
    
    </script>
</head>


<body>
    <br>
    <div class="container">
        <h3>Client list</h3>
    </div>
    <br>
        <div class="container">
            <input type = "date" id="start_date" name="start_date" />
            <input type = "date" id="end_date" name="end_date" />
            <button type="button" class="btn btn-success" name="search" id="search">Search</button>        
            <button type="button" class="btn btn-danger" onclick="refreshPage()">Reset</button>
            <br><br>

        </div>
        
        <div class="container">
        <div class="table-responsive">
            <table class="table table-hovered" id="client_table">
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
                        echo "<td>" . $number . "</td>";
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
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
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

           
           
            $('#search').click(function(){  
                var from_date = $('#start_date').val();  
                var to_date = $('#end_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url: "../../php/filter.php",
                          method:"GET",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#client_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                    alert("Please Select date");
                }  
           });
     });  
    </script>
</body>

</html>