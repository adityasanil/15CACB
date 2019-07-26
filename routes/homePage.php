<?php 
// session_start();

?>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="scripts/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="scripts/owlcarousel/assets/owl.theme.default.min.css">
        <link href='styles/style.css' rel='stylesheet'>
        <script>
            $(document).ready(function(){
                $(".owl-carousel").owlCarousel({
                    items:2, loop:true, center: true, nav:true, autoplay:true, autoplayTimeout:4000, autoplayHoverPause:true,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:1,
                            nav:true
                        },
                        600:{
                            items:1,
                            nav:true
                        },
                        1000:{
                            items:3,
                            nav:true,
                        }
                    }
                });
            });
        </script>
    </head>

    <body>
        <!-- Carousel  -->
        <div class="container">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/slider/lake.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Caption for image 1</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/slider/man.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Caption for image 2</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/slider/sunset.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Caption for image 3</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>  
        </div>


        <!-- About Us -->
        <br><br>
        <section id="about">
        <div class="container" style="background: ;">
            <header class="section-header">
            <h1 class="text-center">About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </header>

            <div class="row about-cols">
                <div class="col-md-4 wow fadeInUp">
                    <div class="about-col">
                        <div class="img">
                            <img src="img/about-mission.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Our Mission</a></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="about-col">
                        <div class="img">
                            <img src="img/about-plan.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="fas fa-list-ul"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Our Plan</a></h2>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="about-col">
                        <div class="img">
                            <img src="img/about-vision.jpg" alt="" class="img-fluid">
                            <div class="icon"><i class="far fa-eye"></i></div>
                        </div>
                        <h2 class="title"><a href="#">Our Vision</a></h2>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <!-- Slider -->
        <br>
        <div class="jumbotron">
            <h4>Our services</h4>
            <br>
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card shadow" style="width: 20rem; height: 300px;">
                        <!-- <img class="card-img-top" src="images/space.jpeg" alt="Card image"> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Service 1</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow" style="width: 20rem; height: 300px;">
                        <!-- <img class="card-img-top" src="images/space.jpeg" alt="Card image"> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Service 2</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow" style="width: 20rem; height: 300px;">
                        <!-- <img class="card-img-top" src="images/space.jpeg" alt="Card image"> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Service 3</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow" style="width: 20rem; height: 300px;">
                        <!-- <img class="card-img-top" src="images/space.jpeg" alt="Card image"> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Service 4</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="card shadow" style="width: 20rem; height: 300px;">
                        <!-- <img class="card-img-top" src="images/space.jpeg" alt="Card image"> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Service 5</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow" style="width: 20rem; height: 300px;">
                        <!-- <img class="card-img-top" src="images/space.jpeg" alt="Card image"> -->
                        <div class="card-body">
                            <h5 class="card-title text-center">Service 6</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Services  -->
        <section id="featured-services">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 box">
                        <i class="fas fa-users"></i>
                        <h4 class="title"><a href="">Our team</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                    </div>

                    <div class="col-lg-4 box box-bg">
                        <i class="fas fa-stopwatch"></i>
                        <h4 class="title"><a href="">Underlying Urge</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                    </div>

                    <div class="col-lg-4 box">
                        <i class="fas fa-heart"></i>
                        <h4 class="title"><a href="">Why 15CACB</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- footer -->
        <div>
            <footer id="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 footer-info">
                                <h3>&copy 2019 15CACB Pvt. Ltd.</h3>
                                <p>
                                    <strong>Phone:</strong> <a href="tel:+91-9967110003" style="color: white;">+91-9967110003</a><br>
                                    <strong>Email:</strong> <a href="mailto:contact@15cacb.com" style="color: white;">contact@15cacb.com</a>
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
            </footer>
        </div>




    <script defer src="scripts/owlcarousel/owl.carousel.min.js"></script>
    </body>
</html>