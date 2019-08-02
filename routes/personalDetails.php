<?php
session_start();

if($_SESSION['user'] == null) {
    header('Location: ../../index.php');
}

$sessionHolder=$_SESSION['user'];

include '../php/connectionDb15CACB.php';

if(isset($_POST["insert"]))
{
    $sql = "SELECT * FROM Users WHERE username = '$sessionHolder'";
    $querySql = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($querySql);

    $id = $row['id'];
    $username = $sessionHolder;
    $identity = $row['identity'];
    $address=$_POST['address'];
    $pan = $_POST['pan'];
    $compName = $_POST['companyName'];
    $gst = $_POST['gstNumber'];
    $ifsc = $_POST['ifscCode'];
    $swift = $_POST['swiftCode'];
    $accNumber = $_POST['accountNumber'];
   
    $query = "INSERT INTO personaldetails(id, username, identity, address, panNumber, companyName, gstNumber, ifscCode, swiftCode, accountNumber) VALUES ('$id','$username', '$identity', '$address','$pan','$compName','$gst','$ifsc','$swift', '$accNumber')";
    if(mysqli_query($connect, $query))  
    {  

        if($identity == "admin") {
            echo '<script type="text/javascript">
                    alert("Details entered successfully! Press OK to continue");                
                    window.location.href = "admin/homeAdmin.php";
              </script>';
        } else{
            echo '<script type="text/javascript">
                    alert("Details entered successfully! Press OK to continue");                
                    window.location.href = "client/homeClient.php";
              </script>';
        }
    }
}
?>

<!DOCTYPE html>
    <head>
        <title>Personal Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
        <style>
            .row {
                justify-content: center;
            }
        </style>
        <script>
            function notifyAdmin() {
                <?php

                    $sqlGetDetails = "SELECT * FROM Users WHERE username = '$sessionHolder'";
                    $queryGetDetails = mysqli_query($connect, $sqlGetDetails);
                    $rowDetails = mysqli_fetch_array($queryGetDetails);
                
                ?>
                var message = 'The above client has signed up on our platform.';
                var name = '<?php echo $rowDetails['firstName'] . " " . $rowDetails['lastName'];  ?>';
                var clientEmail = '<?php echo $rowDetails['email']; ?>';
                var TO_ADDRESS = 'aditya.sanil24@gmail.com';

                var xhttpObj = new XMLHttpRequest();
                xhttpObj.open("POST", "https://script.google.com/macros/s/AKfycbz5haqz1ZW8eEiLCBab9kFENEP9H5FP8FO6rshfjvPe8gSeZqhj/exec", true);
                xhttpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttpObj.send("message=" + message +"&name=" + name  + "&clientEmail=" + clientEmail + "&TO_ADDRESS=" + TO_ADDRESS);
                alert("ran");
            }
        </script>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #0079c4;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"      aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand">
                    <img src="../images/15cacb.png" width="" height="30" class="d-inline-block align-top" alt="">
                </a>
        </nav>
        <br>
            <div class="row">
                <aside class="col-sm-7">
                    <div class="card text-dark">
                        <article class="card-body">
                            <h4 class="card-title text-center mb-4 mt-1">Hello, <?php echo $sessionHolder; ?></h4>
                            <hr>
                            <p class="text-primary text-center">Please fill in your personal details in order to proceed further</p>
                            
                            <!-- FORM START -->
                            <form id="signup" class="form" method="POST" action="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Address</span>
                                        </div>
                                        <input name="address" id="address" class="form-control" placeholder="Residential Address" type="text" required pattern="[A-Za-z0-9'\.\-\s\,]">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">Pan Number</span>
                                        </div>
                                        <input name="pan" id="panNumber" class="form-control" placeholder="10 digit Pan number" type="text" minlength="10" maxlength="10" required pattern="[A-Z0-9]{10}">
                                   </div>
                                </div>
                                
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Compnay Name</span>
                                            </div>
                                            <input name="companyName" id="companyName" class="form-control" placeholder="Company Name" type="text" required>
                                        </div>
                                  
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">GST Number</span>
                                            </div>
                                            <input name="gstNumber" id="gstNumber" class="form-control" placeholder="15 digit GST Number" type="text" required minlength="15" maxlength="15" pattern="[A-Z0-9]{15}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">IFSC Code</i></span>
                                            </div>
                                            <input class="form-control" id="ifscCode" placeholder="11 digit IFSC Code" type="text" name="ifscCode"  required minlength="11" maxlength="11" pattern="[A-Za-z0-9]{11}">
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Swift Code</span>
                                            </div>
                                            <input name="swiftCode" id="swiftCode" class="form-control" placeholder="11 digit number" type="text" required minlength="8" maxlength="11" pattern="[A-Za-z0-9]{11}" >
                                        </div>
                                </div>

                                <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Account Number</span>
                                            </div>
                                            <input name="accountNumber" id="accountNumber" class="form-control" placeholder="Bank Account Number" type="text" required pattern="[0-9]{12}">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" id="submitDetails" class="btn btn-success btn-block" name= "insert" value="Submit" onclick="notifyAdmin()">
                                    <span id="result"></span>
                                </div>
                            </form>
                        </article>
                    </div>
                </aside>
            </div>
        </div>         
    </body>
</html>