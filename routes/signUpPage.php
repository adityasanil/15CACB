<html>
    <head>
        <title>Sign up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

        <style>
            .row {
                justify-content: center;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <div class="row">
	            <aside class="col-sm-7">
                    <div class="card text-dark" style="border: none;">
                        <article class="card-body">
	                        <h4 class="card-title text-center mb-4 mt-1">Sign up</h4>
	                        <hr>
                            <p class="text-primary text-center">Fill in the details, you will be provided with an username & password via email.</p>

                            <!-- FORM START -->
	                        <form id="signup" class="form" method="POST">
                                <!-- <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Name</span>
                                        </div>
                                        <input name="firstName" id="fname" class="form-control" placeholder="First name" type="text" required pattern="[a-zA-Z]+">
                                        <input name="lastName" id="lname" class="form-control" placeholder="Last name" type="text" required pattern="[a-zA-Z]+">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Address</span>
                                        </div>
                                        <textarea name="address" id="add" class="form-control" placeholder="residential address" rows="2" required maxlength="80"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Email</span>
                                        </div>
                                        <input name="email" id="mail" class="form-control" placeholder="email id" type="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Pan number</span>
                                        </div>
                                        <input class="form-control mr-1" id="pan" placeholder="10 digit number" type="text" name="panNumber" required maxlength="10" pattern="[a-zA-Z0-9]+">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Contact</span>
                                        </div>
                                        <input class="form-control" id="contact" placeholder="contact number" type="tel" name="contactNumber" pattern="[0-9]{10}" title="must be 10 digit number" required minlength="10" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Company name</span>
                                        </div>
                                        <input class="form-control" id="company" placeholder="company name" type="text" name="companyName" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">GST number</span>
                                        </div>
                                        <input class="form-control" id="gst" placeholder="15 digit GST number" type="text" name="gstNumber" required minlength="15" maxlength="15" pattern="[a-zA-Z0-9]+">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">IFSC code</span>
                                        </div>
                                        <input class="form-control" id="ifsc" placeholder="11 digit IFSC code" type="text" name="codeIFSC" required minlength="11" maxlength="11" pattern="[a-zA-Z0-9]+"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">SWIFT code</span>
                                        </div>


                                        <input class="form-control" id="swift" placeholder="8 or 11 characters SWIFT code" type="contact" name="codeSWIFT" required minlength="8" maxlength="11" pattern="[0-9]+">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Account number</span>
                                        </div>
                                        <input class="form-control" id="account" placeholder="bank account number" type="text" name="accountNumber" required minlength="11" maxlength="11" pattern="[0-9]+" >
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <input type="submit" id="submitDetails" class="btn btn-success btn-block" value="Submit">
                                    <span id="result"></span>
                                </div>
                            </form>
                        </article>
                    </div>
                </aside>
            </div>
        </div> 

        <script type="text/javascript">
            $(document).ready(function() {
                $("#submitDetails").click(function(event) {
                    event.preventDefault();
                    console.log("Click");
                    // $.post( "../insertData.php", $("#signup").serialize(), function(data){
                    // $.post( "../insertData.php", {name: "John"}, function(data){
                        console.log(data);
                    });
                });
        </script>
    </body>
</html>
