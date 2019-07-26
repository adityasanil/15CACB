<?php 
// session_start();

?>
<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href='styles/navbarStyles.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="container">
            <div class="row">
                <aside class="col-sm-5">
                    <h3 class="title lead mt-2">Contact our experts</h3>
                    <span>
                        <p class="content text-muted">
                            We would love to help. A team 
                            member will be assigned to address your queries.
                            <br>
                            
                        </p>
                        <p class="content text-muted">
                        Get in touch with us.
                        </p>
                    </span>
                </aside>
                <aside class="col-sm-7 collide">
                    <br>
                    <div class="card" style="border: none;">
                    <article class="card-body">
                        <form class="gform" id="Contactus" action="https://script.google.com/macros/s/AKfycbwqiueJt4tly5z1-Vl_cpaB4MtlyxM7x--7boN7vBjp2eVs_kAW/exec" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Your name" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Your email ID" type="email" name="clientEmail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Contact number" type="tel" name="clientTelephone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Type your query" type="text" rows="4" name="clientQuery" required></textarea>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-success" name="querySubmit">Submit</button>
                            </div>                            
                            <div class="thankyou_message" style="display:none;">
                                <h4><em>Thanks</em> for contacting us!</h4>
                                <h4>Our team will get back to you soon!</h4>
                            </div>
                            
                        </form>
                    </article>    
                </aside>
            </div>
        </div>
        <script data-cfasync="false" type="text/javascript" src="https://cdn.rawgit.com/dwyl/html-form-send-email-via-google-script-without-server/master/form-submission-handler.js"></script>
    </body>
</html>