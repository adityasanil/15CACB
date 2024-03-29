<?php
session_start();

if ($_SESSION['user'] == null) {
    header('Location: ../../index.php');
}

$sessionHolder = $_SESSION['user'];

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="png" href="../../images/15.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link href='../../styles/navbarStyles.css' rel="stylesheet">
    <link href="../../styles/style.css" rel="stylesheet">
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function logout() {
            window.location.href = "../../php/logout.php";
        }
    </script>

</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #0079c4;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="">
                <img src="../../images/15cacb.png" width="" height="30" class="d-inline-block align-top" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <div class="line"></div>
                <ul class="navbar-nav nav mr-auto mt-2 mt-lg-0" id="pills-tab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" id="pills-dashboardAdmin-tab" data-toggle="pill" href="#pills-dashboardAdmin" role="tab" aria-controls="pills-dashboardAdmin" aria-selected="true">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-caselaws-tab" data-toggle="pill" href="#pills-caselaws" role="tab" aria-controls="pills-caselaws" aria-selected="true">Caselaws</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-rules-tab" data-toggle="pill" href="#pills-rules" role="tab" aria-controls="pills-rules" aria-selected="false">Rules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-createBlog-tab" data-toggle="pill" href="#pills-createBlog" role="tab" aria-controls="pills-createBlog" aria-selected="false">Create Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-listClients-tab" data-toggle="pill" href="#pills-listClients" role="tab" aria-controls="pills-listClients" aria-selected="false">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-addAdmin-tab" data-toggle="pill" href="#pills-addAdmin" role="tab" aria-controls="pills-addAdmin" aria-selected="false">Admins</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link btn btn-success btn-block mb-1" id="pills-logout-tab" data-toggle="pill" href="#pills-logout" role="tab" aria-controls="pills-logout" aria-selected="false" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-dashboardAdmin" role="tabpanel" aria-labelledby="pills-dashboardAdmin-tab">
                <?php include '../../routes/admin/dashboardAdmin.php'; ?>
            </div>
            <div class="tab-pane fade" id="pills-caselaws" role="tabpanel" aria-labelledby="pills-caselaws-tab">
                <?php include '../../routes/caselaws.php'; ?>
            </div>
            <div class="tab-pane fade" id="pills-rules" role="tabpanel" aria-labelledby="pills-rules-tab">
                <?php include '../../routes/rules.php'; ?>
            </div>
            <div class="tab-pane fade" id="pills-createBlog" role="tabpanel" aria-labelledby="pills-createBlog-tab">
                <?php include '../../routes/createBlog.php'; ?>
            </div>
            <div class="tab-pane fade" id="pills-listClients" role="tabpanel" aria-labelledby="pills-listClients-tab">
                <?php include '../../routes/clientsList.php'; ?>
            </div>
            <div class="tab-pane fade" id="pills-addAdmin" role="tabpanel" aria-labelledby="pills-addAdmin-tab">
                <?php include '../../routes/addAdmin.php'; ?>
            </div>

            <!-- Logout Button -->
            <div class="tab-pane fade" id="pills-logout" role="tabpanel" aria-labelledby="pills-logout-tab">
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>