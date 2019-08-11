<?php

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function myFunction() {
            var email = document.getElementById('changePwdEmail').value;
            var newPwd = document.getElementById('changePwd1').value;
            var newConfirmPwd = document.getElementById('changePwd2').value;

            if (email.length == 0 || newPwd.length == 0 || newConfirmPwd.length == 0) { 
                document.getElementById("resultPass").innerHTML = "Fill all the fields";
                return;
            } else if (newPwd != newConfirmPwd) {
                    document.getElementById("resultPass").innerHTML = "Passwords did not match.";
                    return;
            } else {
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        document.getElementById("resultPass").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("POST", "php/resetPassword.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("email=" + email + "&newPwd=" + newPwd + "&confirmPwd=" + newConfirmPwd);
            }
        }
    </script>
</head>
<body>
<br><br>
    <div class="container">
        <div class='row passPosition'>
            <div class="card mb-3 p-5 shadow" style="max-width: 700px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <br class='brHide'><br class='brHide'><br class='brHide'>
                        <div>
                            <p class='lead passHead ml-1'>Reset Password</p>
                        </div>
                        <div class="ml-5">
                            <img src="images/changePass.png" class='lockPass' alt="Reset Password">
                        </div>
                        <br>
                        <div>
                            <p><small class='text-muted'>Create a new password. Then re-enter to confirm your new password.</small></p>
                        </div>
                    </div>
                    <div class="linePass ml-2"></div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="changePwdEmail" class="passHead">Your Email</label>
                                <input type="email" class="form-control" id="changePwdEmail" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <label for="changePwd1" class="passHead">New Password</label>
                                <input type="password" class="form-control" id="changePwd1" placeholder="password" minlength="6" required>
                            </div>
                            <div class="form-group">
                                <label for="changePwd2" class="passHead">Confirm New Password</label>
                                <input type="password" class="form-control" id="changePwd2" placeholder="password" minlength="6" required>
                            </div>
                            <button class="btn btn-success" onclick="myFunction()">Submit</button>
                            <div id='resultPass'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>




</body>
</html>