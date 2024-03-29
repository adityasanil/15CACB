<?php
// session_start()

include '../../php/connectionDb15CACB.php';
$result = mysqli_query($connect, "SELECT * FROM posts WHERE selectedOption='Rule' ORDER BY timestamp ASC");


?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <style>
        .col-md-8 {
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            font-weight: 200;
        }

        .card-img-top {
            width: 100%;
            height: 25vh;
            object-fit: cover;
        }

        .card-img-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            transition-property: background-color, color;
            transition-duration: 0.2s;
        }

        .card-img-overlay:hover {
            color: #4ece3d;
            background-color: rgba(0, 0, 0, 0.8) !important;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <h3 class="">Rules</h3>
    </div>
    <div class="card-deck">
        <?php
        $a = 1;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="card text-white">
                    <!--<img class="card-img" src="../images/fractal.jpeg">-->
                    <?php echo "<img class='card-img' src='../../images/blogs/" . $row['image'] . "' alt='Card image' >"; ?>
                    <div class="card-img-overlay">
                        <br>
                        <h5 class="card-title stretched-link"><?php echo $row['title']; ?></h5>
                        <!--<h5 class="card-text">Rule ID:&nbsp<?php echo $row["post_id"]; ?></h5>-->
                        <!--<p class="card-text">Date of posting:&nbsp<?php echo $row["date"]; ?></p>-->
                        <a id="<?php echo $row["post_id"]; ?>" href="#" class="view_data stretched-link" style="display: hidden;"></a>
                        <!--<input type="button" style="display:none;" name="view" value="view" id="<?php echo $row["post_id"]; ?>" class="btn btn-info btn-xs read_data" />-->
                    </div>
                </div><br>

                <!--<div class="col-sm-6 col-md-5 col-lg-3">
                                    <div class="card shadow mb-3" style="width: 16rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                                            <p class="card-text"><small class="text-muted text-success">Date of posting:&nbsp<?php echo $row["date"]; ?></small></p>
                                            <input type="button" name="view" value="view" id="<?php echo $row["post_id"]; ?>" class="btn btn-info btn-xs view_data" />
                                        </div>
                                    </div>-->
            </div>
            <?php
            ++$a;
        }
        ?>
    </div>

    <div id="ruleModal" class="modal fade">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <!--<div class="modal-header">    
                            <h4 class="modal-title">Rule</h4>  
                        </div>-->
                <div class="modal-body" id="rule_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><br><br><br>


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


    <script>
        $(document).ready(function() {
            $('.view_data').click(function() {
                var rule_id = $(this).attr("id");
                $.ajax({
                    url: "../../php/selectRule.php",
                    method: "post",
                    data: {
                        rule_id: rule_id
                    },
                    success: function(data) {
                        $('#rule_detail').html(data);
                        $('#ruleModal').modal("show");
                    }
                });
            });
        });
    </script>

</body>

</html>