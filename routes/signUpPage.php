<?php
// session_start();

?>
<!DOCTYPE html>

<head>
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .row {
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <br><br>
        <div class="row">
            <aside class="col-sm-7">
                <div class="card text-dark shadow">
                    <article class="card-body">
                        <h4 class="card-title text-center mb-4 mt-1">Sign up</h4>
                        <hr>
                        <p class="text-primary text-center lead">Fill in the details, to register yourself.</p>

                        <!-- FORM START -->
                        <form id="signup" class="form" method="POST" action="php/registerUser.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-user"></i> </span>
                                    </div>
                                    <input name="firstName" id="fname" class="form-control" placeholder="First name" type="text" required pattern="[a-zA-Z]+">
                                    <input name="lastName" id="lname" class="form-control" placeholder="Last name" type="text" required pattern="[a-zA-Z]+">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input name="username" id="username" class="form-control" placeholder="username" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input name="password" id="password" class="form-control" placeholder="password" type="password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input name="email" id="mail" class="form-control" placeholder="email id" type="email" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        </div>
                                        <input class="form-control" id="contact" placeholder="contact number" type="tel" name="contactNumber" pattern="[0-9]{10}" title="must be 10 digit number" required minlength="10" maxlength="10">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submitDetails" class="btn btn-success btn-block" name="registerUser" value="Submit">
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