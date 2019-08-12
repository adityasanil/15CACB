<?php 
session_start();

include "php/connectionDb15CACB.php";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['loginSubmit'])) {

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $sqlFindUser = "SELECT * FROM Users WHERE userName ='$username'";
    $findDetails = "SELECT * FROM personaldetails WHERE username = '$username'";
    $queryFindUser = mysqli_query($connect, $sqlFindUser);
    $queryFindDetails = mysqli_query($connect, $findDetails);
    $countUsers = mysqli_num_rows($queryFindUser);
    $row = mysqli_fetch_array($queryFindUser);
    $r = mysqli_num_rows($queryFindDetails);

    if ($countUsers > 0) {
        if(password_verify($password, $row['password'])) {
            $_SESSION['user'] = $username;
            $userSession = $_SESSION['user'];
            
            if($row['identity'] == 'admin') {
                // if($r > 0){
             ?>
                <script >
                window.location.href = "routes/admin/homeAdmin.php";
                </script>
                <?php
                // }
                // else {
                ?>
                <!-- <script >
                window.location.href = "routes/personalDetails.php";
                </script>
 -->                <?php
                // }
            }

            if($row['identity'] == 'client') {
                if($r > 0){
             ?>
                <script >
                window.location.href = "routes/client/homeClient.php";
                </script>
                <?php
                }
                else {
                ?>
                <script >
                window.location.href = "routes/personalDetails.php";
                </script>
                <?php
                }
            }

        }
        else {
            echo "<script type='text/javascript'>alert('Invalid password')</script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('User does not exist');</script>";
    }
}

?>

<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

        <style>
            .row {
                justify-c ontent: center;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <br><br><br><br>
            <div class="row">
	            <aside class="col-sm-5">
                    <div class="card shadow">
                        <article class="card-body">
	                        <h4 class="card-title text-center mb-4 mt-1">Login</h4>
	                        <hr>
	                        <p class="text-primary text-center lead">Sign in to your account</p>
	                        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control lead" placeholder="Username" type="text" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input class="form-control lead" placeholder="Password" type="password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block" name="loginSubmit">Login</button>
                                </div>
                                <div>
                                    <p class="text-center"><a class="text-primary lead" class="nav-link" id="pills-resetPass-tab" data-toggle="pill" href="#pills-resetPass" role="tab" aria-controls="pills-resetPass" aria-selected="false">Forgot password?</a></p>
                                </div>
                            </form>
                        </article>
                    </div>
                </aside>
            </div>
        </div> 
    </body>
</html>