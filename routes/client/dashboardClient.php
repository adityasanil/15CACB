<?php 
session_start();

?>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href='../../styles/navbarStyles.css' rel="stylesheet">
        <style>
            .btn-sm {
                padding: 1px 1px !important ;
                font-size: 10px !important ;
                border-radius: 5px !important ;
            }
        </style>
    </head>

    <body>
        <form>
            <div class="form-group"><br>
                <label for="fileInput" class="lead">Initiate a new file</label>
                <div class="input-group">
                    <textarea class="form-control" id="remarks" placeholder="Type your remarks" type="text" rows="4" name="clientRemarks"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row float-right">
                    <div class="col-auto">
                        <span class='label label-info mt-2 mr-2' id="uploadFileInfo"></span>
                        <label class="btn btn-success" for="myFileSelector">
                            <input id="myFileSelector" type="file" style="display:none" 
                            onchange="$('#uploadFileInfo').html(this.files[0].name)">
                            Upload File
                        </label>
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-success" name="submitFile" value="Submit">
                    </div>
                </div>
            </div>
        </form>
        <br><br><hr>

        <form>
            <label for="fileInput" class="lead">Initiated Docs</label>
            <div class="sortBy">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group mr-2" role="group">
                        <button type="button" class="btn btn-light btn-sm mr-4 disabled" style="font-weight: 900;">SORT BY</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">ALL</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">PENDING</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">APPROVED</button>
                        <button type="button" class="btn btn-light btn-sm mr-3">DECLINED</button>
                    </div>
                </div>
            </div><br>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Party Name</th>
                            <th scope="col">Date Registered</th>
                            <th scope="col">ACK Number</th>
                            <th scope="col">Tracking Number</th>
                            <th scope="col">UID</th>
                            <th scope="col">Download 15CACB</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>        
    </body>
</html>