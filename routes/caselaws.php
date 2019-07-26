<?php
// session_start()


include 'php/connectionDb15CACB.php';
$result = mysqli_query($connect, "SELECT * FROM posts where selectedOption='caselaw'");


?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Caselaws</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>      
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
        <style>
            .col-md-8{
                font-family: 'Oswald', sans-serif;
                font-size: 20px;
                font-weight: 200;
           }
            .card-img-top {
                width: 100%;
                height: 20vh;
                object-fit: cover;
            }
        </style>
    </head>

    <body>
        <br>
        <h3 class="">Caselaws</h3>
        <div class="card-deck">
                <?php
                    while ($row = mysqli_fetch_array($result)) 
                    {
                    ?>
                    <div class="col-sm-6 col-md-5 col-lg-3">
                    <div class="card shadow mb-3" style="width: 16rem;">
                    <?php echo '<img class="card-img-top" src="data:image;base64,'.base64_encode($row["image"]).'" alt="Card image">' ; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                        <p class="card-text"><small class="text-muted text-success">Date of posting:&nbsp<?php echo $row["date"];?></small></p>
                        <input type="button" name="view" value="view" id="<?php echo $row["post_id"]; ?>" class="btn btn-info btn-xs view_data" />

                    </div>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
       </div>
    </body>
</html>



<div id="dataModal" class="modal fade">  
      <div class="modal-dialog modal-xl modal-dialog-scrollable">  
           <div class="modal-content">  
                <div class="modal-header">    
                     <h4 class="modal-title">Caselaw</h4>  
                </div>
                <div class="modal-body" id="article_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  


<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var article_id = $(this).attr("id");  
           $.ajax({  
                url:"php/select.php",  
                method:"post",  
                data:{article_id:article_id},  
                success:function(data){  
                     $('#article_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>


    <!--         <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-4" style="width: 16rem;">
                    <img class="card-img-top" src="images/space.jpeg" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title stretched-link">Card 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        <a href="https://www.google.com" class="stretched-link" style="display: hidden" target="_blank"></a>
                        <p class="card-text"><small class="text-muted text-success">Date of posting</small></p>
                    </div>
                </div>
             </div>

             <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-4" style="width: 16rem;">
                    <img class="card-img-top" src="images/space.jpeg" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title stretched-link">Card 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        <a href="https://www.google.com" class="stretched-link" style="display: hidden" target="_blank"></a>
                        <p class="card-text"><small class="text-muted text-success">Date of posting</small></p>
                    </div>
                </div>
             </div>

             <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-4" style="width: 16rem;">
                    <img class="card-img-top" src="images/space.jpeg" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title stretched-link">Card 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        <a href="https://www.google.com" class="stretched-link" style="display: hidden" target="_blank"></a>
                        <p class="card-text"><small class="text-muted text-success">Date of posting</small></p>
                    </div>
                </div>
             </div>

             <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-4" style="width: 16rem;">
                    <img class="card-img-top" src="images/space.jpeg" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title stretched-link">Card 4</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. </p>
                        <a href="https://www.google.com" class="stretched-link" style="display: hidden" target="_blank"></a>
                        <p class="card-text"><small class="text-muted text-success">Date of posting</small></p>
                    </div>
                </div>
             </div>
             
        
        </div>-->
        


        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->