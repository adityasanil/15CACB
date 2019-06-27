<?php 

?>
<html>
    <head>
        <title>Sign up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

        <style>
            .row {
                justify-content: center;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <br>
            <div class="row">
	            <aside class="col-sm-8">
                    <div class="card text-dark">
                        <article class="card-body">
	                        <h4 class="card-title text-center mb-4 mt-1">Sign up</h4>
	                        <hr>
	                        <p class="text-primary text-center">Fill the details, you will be provided with a username, password via email.</p>
	                        <form class="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Name</span>
                                        </div>
                                        <input name="" class="form-control" placeholder="First name" type="text">
                                        <input name="" class="form-control" placeholder="Last name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Address</span>
                                        </div>
                                        <textarea name="" class="form-control" placeholder="residential address" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Email</span>
                                        </div>
                                        <input name="" class="form-control" placeholder="email id" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Pan number</span>
                                        </div>
                                        <input class="form-control mr-1" placeholder="10 digit number" type="text">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Contact</span>
                                        </div>
                                        <input class="form-control" placeholder="contact number" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Company name</span>
                                        </div>
                                        <input class="form-control" placeholder="company name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">GST number</span>
                                        </div>
                                        <input class="form-control" placeholder="15 digit GST number" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">IFSC code</span>
                                        </div>
                                        <input class="form-control" placeholder="11 digit IFSC code" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">SWIFT code</span>
                                        </div>
                                        <input class="form-control" placeholder="8 or 11 characters SWIFT code" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Accout number</span>
                                        </div>
                                        <input class="form-control" placeholder="bank account number" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-block" onclick="location.href='#'">Submit</button>
                                </div>
                            </form>
                        </article>
                    </div>
                </aside>
            </div>
        </div> 
    </body>
</html>