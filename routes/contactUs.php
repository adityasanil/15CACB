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
                        <form class="form">
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
                        </form>
                    </article>    
                </aside>
            </div>
        </div> 
    </body>
</html>