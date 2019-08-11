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
				<div class="modal-body">
      							<p><b>Address:</b>&nbsp'.$row["address"].'</p>
                                <p><b>Pan Number:</b>&nbsp'.$row["panNumber"].'</p>
                                <p><b>Company Name:</b>&nbsp'.$row["companyName"].'</p>
                                <p><b>GST Number:</b>&nbsp'.$row["gstNumber"].'</p>
                                <p><b>IFSC Code:</b>&nbsp'.$row["ifscCode"].'</p>
                                <p><b>Swift Code:</b>&nbsp'.$row["swiftCode"].'</p>
                                <p><b>Account Number:</b>&nbsp'.$row["accountNumber"].'</p>
      							
      							
        		</div>';
    			
							

		}
		echo $output;
	}
?>

