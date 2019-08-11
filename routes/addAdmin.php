<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add admins</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script type="text/javascript">
		function addAdmin() {
			var firstName = document.getElementById('firstName').value;
			var lastName = document.getElementById('lastName').value;
			var userName = document.getElementById('userName').value;
			var contactNumber = document.getElementById('contactNumber').value;
			var email = document.getElementById('email').value;
			var password = document.getElementById('password').value;
			var xhttpObj = new XMLHttpRequest();


			if (firstName.length == 0 || lastName.length == 0 || userName.length == 0 || contactNumber.length == 0 || email.length == 0 || password.length == 0 ) {
				window.alert("Please fill all the fields to register an admin.");
			} else {
				xhttpObj.open("POST", "../../php/registerAdmin.php", true);
				xhttpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttpObj.send("firstName="+firstName+"&lastName="+lastName+"&userName="+userName+"&contactNumber="+contactNumber+"&email="+email+"&password="+password);

				xhttpObj.onreadystatechange = function() {
	                if (this.readyState === 4 && this.status === 200) {
	                	window.alert(this.responseText);
	                	showAdminList();
	                }
	            };
        	}
		}

		function showAdminList() {
			var xhttpObj2;
            xhttpObj2 = new XMLHttpRequest();
            xhttpObj2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("adminTable").innerHTML = this.responseText;
                }
            };
            xhttpObj2.open("GET", "../../php/getAdminList.php", true);
            xhttpObj2.send();
		}
	</script>
</head>
<body onload="showAdminList()">
	<br>
	<div class="container">
		<h3>Add admin</h3>
	</div>
	<br>
	<div class="container">
		<div class="form-row">
			<div class="form-group col-md-4">
			  <label for="firstName">First name</label>
			  <input type="text" class="form-control" id="firstName" placeholder="enter first name" required>
			</div>

			<div class="form-group col-md-4">
			  <label for="lastName">Last name</label>
			  <input type="text" class="form-control" id="lastName" placeholder="enter last name" required>
			</div>

			<div class="form-group col-md-4">
			  <label for="userName">Username</label>
			  <input type="text" class="form-control" id="userName" placeholder="enter username" required>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
			  <label for="contact">Contact number</label>
			  <input type="text" class="form-control" id="contactNumber" placeholder="enter contact number" required>
			</div>

			<div class="form-group col-md-4">
			  <label for="email">Email</label>
			  <input type="email" class="form-control" id="email" placeholder="enter email" required>
			</div>
			<div class="form-group col-md-4">
			  <label for="password">Password</label>
			  <input type="password" class="form-control" id="password" placeholder="enter password" required>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-2">
				<button class="btn btn-primary" onclick="addAdmin()" style="background-color: #0079c4;">Register</button>
			</div>
		</div>
	</div>
	<hr>
	<div class="container">
		<label for="fileInput" class="lead">Admin list</label>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col" class="">#</th>
						<th scope="col">Username</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Contact</th>
						<th scope="col">Added By</th>
					</tr>
				</thead>
				<tbody id='adminTable'>
					
				</tbody>
			</table>
		</div>
	</div>
	







</body>
</html>