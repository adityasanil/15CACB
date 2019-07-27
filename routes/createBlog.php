<?php 
session_start();


$sessionHolder=$_SESSION['user'];

include 'php/connectionDb15CACB.php';

if(isset($_POST["insert"]))  
 {

    $sql = "SELECT * FROM Users WHERE username = '$sessionHolder'";
    $querySql = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($querySql);

    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $identity = $row['identity'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $option=$_POST['selectbox'];
    $title = $_POST['title'];
    $content = $_POST['image_text'];
    $date = date("D\, jS M Y");    
    $query = "INSERT INTO posts(firstName, lastName, identity, selectedOption, title, content, image, date) VALUES ('$firstName','$lastName','$identity','$option','$title','$content','$file', '$date')";
    if(mysqli_query($connect, $query))  
      {  
       echo '<script>alert("Post created successfully")</script>';  
      }  



      /*$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $title = $_POST['title'];
      $content = $_POST['image_text'];
      $date = date("D\, jS M Y");
      $query = "INSERT INTO caselaw(firstName, title, content, image, date) VALUES ('$sessionHolder', $title','$content','$file', '$date')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  */
 } 


?>
<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href='styles/navbarStyles.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0-beta.1/js/froala_editor.pkgd.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h1>Create blog</h1><br>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group"><br>
                    <label><h5>Select what you want to create(Caselaw or Rule):</h3></label>  
                    <select name="selectbox">
                        <option value="Rule" name="rule">Rule</option>
                        <option value="Caselaw" name="caselaw">Caselaw</option>
                    </select><br><br>
                    <div class="input-group">
                        <textarea class="form-control" id="title" placeholder="Enter the title here (MAX 100 CHARACTERS)" type="text" rows="1" name="title" required></textarea> 
                    </div><br>
                    <textarea 
                     id="text" 
                     rows="4" 
                     name="image_text" ></textarea>
                        <script>
                        var editor = new FroalaEditor('#text', {
                        toolbarButtons: {
                        'moreText': {
                        'buttons': ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting']
                            },
                            'moreParagraph': {
                                'buttons': ['quote']
                            },
                            'moreRich': {
                                    'buttons': ['insertLink', 'insertTable', 'specialCharacters', 'embedly', 'insertHR']
                            },
                            'moreMisc': {
                            'buttons': ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll', 'html', 'help'],'align': 'right','buttonsVisible': 2
                            }
                        },
                        quickInsertTags: []

                        });
                        </script>
 
                    </div>
                    <div class="form-group">
                        <div class="form-row float-right">
                            <div class="col-auto">
                            <span class='label label-info mt-2 mr-2' id="uploadFileInfo"></span>
                            <label class="btn btn-success" for="myFileSelector">
                                <input id="myFileSelector" type="file" style="display:none" name="image" onchange="$('#uploadFileInfo').html(this.files[0].name)">
                                Upload Image
                            </label>
                            </div>
                            <div class="col-auto">
                            <input type="submit" class="btn btn-success" id="insert" name="insert" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>