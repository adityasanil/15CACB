<?php 

?>
<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

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
                    <div class="card">
                        <article class="card-body">
	                        <h4 class="card-title text-center mb-4 mt-1">Login</h4>
	                        <hr>
	                        <p class="text-primary text-center">Sign in to your account</p>
	                        <form class="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i> </span>
                                        </div>
                                        <input class="form-control" placeholder="Username" type="text" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input class="form-control" placeholder="Password" type="password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block" name="loginSubmit">Login</button>
                                </div>
                                <p class="text-center"><a href="#" class="text-primary">Forgot password?</a></p>
                            </form>
                        </article>
                    </div>
                </aside>
            </div>
        </div> 
    </body>
</html>