<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CACB</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="icon" type="png" href="images/15.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href='styles/navbarStyles.css' rel="stylesheet">
    </head>

    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #0079c4;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="">
                    <img src="images/15cacb.png" width="" height="30" class="d-inline-block align-top" alt="">
                </a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <div class="line"></div>
                    <ul class="navbar-nav nav mr-auto mt-2 mt-lg-0" id="pills-tab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="pills-caselaws-tab" data-toggle="pill" href="#pills-caselaws" role="tab" aria-controls="pills-caselaws" aria-selected="true">Caselaws</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-rules-tab" data-toggle="pill" href="#pills-rules" role="tab" aria-controls="pills-rules" aria-selected="false">Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contactus-tab" data-toggle="pill" href="#pills-contactus" role="tab" aria-controls="pills-contactus" aria-selected="false">Contact us</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item mr-1">
                            <a class="nav-link btn btn-login btn-block mb-1" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Log in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success btn-block mb-1" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-caselaws" role="tabpanel" aria-labelledby="pills-caselaws-tab">
                    <?php include 'routes/caselaws.php'; ?>  
                </div>
                <div class="tab-pane fade" id="pills-rules" role="tabpanel" aria-labelledby="pills-rules-tab">
                    <?php include 'routes/rules.php'; ?>  
                </div>
                <div class="tab-pane fade" id="pills-contactus" role="tabpanel" aria-labelledby="pills-contactus-tab">
                    <?php include 'routes/contactUs.php'; ?>  
                </div>
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <?php include 'routes/logInPage.php'; ?>  
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php include 'routes/signUpPage.php'; ?>  
                </div>
            </div>
        </div>
        
    </body>

</html