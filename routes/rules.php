<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href="../styles/navbarStyle.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0079c4;">
            <div class="container">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Brand -->
                <a class="navbar-brand" href="caselaws.php">
                    <img src="../images/15cacb.png" width="" height="40" alt="">
                </a>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <div class="line"></div>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li> -->
                    <li class="nav-item active">
                        <a class="nav-link" href="caselaws.php">Caselaws <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rules.php">Rules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs.php">Contact us</a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- <button class="btn btn-success my-2 my-sm-0" type="submit">Logout</button> -->
                        <button class="btn btn-login btn-dark my-2 my-sm-0 mr-2" onclick="location.href='logInPage.php'" type="button">Log in</button>
                        <button class="btn btn-success my-2 my-sm-0" onclick="location.href='signUpPage.php'" type="button">Sign up</button>
                    </form>
                </div>
            </div>
        </nav>  
        
        <h1>Rules</h1>
    </body>
</html>