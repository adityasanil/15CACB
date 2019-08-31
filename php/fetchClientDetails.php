<?php

if (isset($_POST["client_id"]))

	{	
		$output="";
        include 'connectionDb15CACB.php';
		$query = "SELECT * FROM personaldetails WHERE id ='".$_POST["client_id"]."'";
		$result = mysqli_query($connect, $query);


		while($row = mysqli_fetch_array($result))

		{

			$output.='
				<div class="modal-body" id="clientDetails">
      							<p><b>Address:</b>&nbsp'.$row["address"].'</p>
                                <p><b>Pan Number:</b>&nbsp'.$row["panNumber"].'</p>
                                <p><b>Company Name:</b>&nbsp'.$row["companyName"].'</p>
                                <p><b>GST Number:</b>&nbsp'.$row["gstNumber"].'</p>
                                <p><b>IFSC Code:</b>&nbsp'.$row["ifscCode"].'</p>
                                <p><b>BSR Code:</b>&nbsp'.$row["bsrCode"].'</p>
                                <p><b>Account Number:</b>&nbsp'.$row["accountNumber"].'</p>
                                <p><b>Info 1:</b>&nbsp&nbsp<input type="text" id="info1" name="info1" value="'.$row['info1'].'" /></p>
                                <p><b>Info 2:</b>&nbsp&nbsp<input type="text" id="info2" name="info2" value="'.$row['info2'].'" /></p>
                                <p><b>Info 3:</b>&nbsp&nbsp<input type="text" id="info3" name="info3" value="'.$row['info3'].'" /></p>
                                <p><b>Info 4:</b>&nbsp&nbsp<input type="text" id="info4" name="info4" value="'.$row['info4'].'" /></p>
                                <p><b>Info 5:</b>&nbsp&nbsp<input type="text" id="info5" name="info5" value="'.$row['info5'].'" /></p>
                                <input type="hidden" id="username" name="username" value="'.$row["username"].'">
                </div>';
   			
							

		}
		echo $output;
	}
?>
<button type = "button" class="btn btn-success" onclick="addDetails(document.getElementById('info1').value, document.getElementById('info2').value, document.getElementById('info3').value, document.getElementById('info4').value, document.getElementById('info5').value, document.getElementById('username').value); " name="submit" >Submit</button>

