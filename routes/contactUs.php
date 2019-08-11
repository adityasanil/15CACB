<?php
// session_start();

?>
<html>

<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <br>
    <div class="jumbotron" style="background-color: white !important;">
        <div class="row">
            <aside class="col-sm-5">
                <center>
                    <h3 class="title lead mt-2">Contact our experts</h3>
                    <div>
                        <p class="content text-muted">
                            We would love to help. A team
                            member will be assigned to address your queries.
                            <br>
                        </p>
                    </div>
                    <div>
                        <img src="images/mail.png" class='mailImg' alt="Reset Password">
                    </div>
                    <br>
                    <div>
                        <p class="content text-muted">
                            Get in touch with us.
                        </p>
                    </div>
                </center>

            </aside>

            <aside class="col-sm-7 collide">
                <br>
                <div class="card" style="border: none;">
                    <article class="card-body">
                        <form class="gform" id="Contactus" action="https://script.google.com/macros/s/AKfycbx_qSLxsU588A4LpYsBUp1bNEEe8j2gktIOSxg3jg/exec" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Your name" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Your email ID" type="email" name="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Contact number" type="tel" name="Telephone" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Type your query" type="text" rows="4" name="Query" required></textarea>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" class="btn btn-success" name="">Send</button>
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

    <!-- footer-->
    <div>
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 footer-info">
                            <!-- <h3>15CACB Pvt. Ltd.</h3> -->
                            <p>
                                <strong>Phone:</strong> <a href="tel:+91-9967110003" style="color: black;">+91-9967110003</a><br>
                                <strong>Email:</strong> <a href="mailto:team@15cacb.com" style="color: black;">team@15cacb.com</a>
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 footer-contact text-right">
                            <div class="social-links">
                                <a href="https://twitter.com/financelookup" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/financelookup/" class="facebook" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.linkedin.com/company/f-lookup-advisors/" class="linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="madeBy">
                    Developed by <a href="https://www.linkedin.com/in/adityasanil/" target="_blank">Sanil</a> &
                    <a href="https://www.linkedin.com/in/jigar98/" target="_blank">Jigar</a>
                </div>
            </div>
        </footer>
    </div>



    <script data-cfasync="false" type="text/javascript" src="https://cdn.rawgit.com/dwyl/html-form-send-email-via-google-script-without-server/master/form-submission-handler.js"></script>
</body>

</html>