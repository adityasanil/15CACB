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
            <br>
            <div class="row">
                <aside class="col-sm-5">
                    <h4 class="content ">Contact our experts</h4>
                    <span>
                        <p class="content text-muted">
                            Contrary to popular belief, Lorem Ipsum is not simply random text. 
                            It has roots in a piece of classical Latin literature from 45 BC, 
                            making it over 2000 years old. Richard McClintock, a Latin professor 
                            at Hampden-Sydney College in Virginia.
                            <br>
                            It is a long established fact that a reader will be distracted by the readable 
                            content of a page when looking at its layout. The point of using Lorem Ipsum 
                            is that it has a more-or-less normal distribution of letters, as opposed to 
                            using 'Content here, content here', making it look like readable English.
                        </p>
                        <p class="content text-muted">
                            There are many variations of passages of Lorem Ipsum available, but the majority 
                            have suffered alteration in some form, by injected humour, or randomised words 
                            which don't look even slightly believable.
                        </p>
                    </span>
                </aside>
                <aside class="col-sm-7 collide">
                    <div class="card" style="border: none;">
                    <article class="card-body"><br>
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