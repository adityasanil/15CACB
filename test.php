<?php 

include 'php/connectionDb15CACB.php';


?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <script>
        function showDropDown() {
            document.getElementById('drop').classList.toggle('show');
        }

        function searchClient(value) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("list").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "searchFilter.php?value=" + value, true);
            xhttp.send();
        }
    </script>
</head>

<body>

    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" onclick="showDropDown()">
        Party Name
        </button>

    <div class="dropdown-menu" id='drop'>
        <input type="text" class='form-control' name="" placeholder='enter name here' onkeyup="searchClient(this.value)">
        <div id='list'><div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>