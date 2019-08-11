<?php

if (isset($_POST["caselaw_id"]))

	{	
		$output="";
        include 'connectionDb15CACB.php';
		$query = "SELECT * FROM posts WHERE post_id ='".$_POST["caselaw_id"]."'";
		$result = mysqli_query($connect, $query);


		while($row = mysqli_fetch_array($result))

		{

			$output.='

                <div class="modal-header">
                    <h5 class="modal-title">'.$row["title"].'</h5>
                </div>
				<div class="modal-body">
					<div class="conatainer-fluid">
						<div class="row">
      						<div class="col-md-4"><img class="img-responsive img-fluid" style="border:1px solid black; padding:5px; max-height:250px;" src="../../images/blogs/'.($row['image']).'"/></div>
      						<div class="col-md-8 ml-auto">
      							<p><b>Title:</b>&nbsp'.$row["title"].'</p>
      							<p><b>Posted By:</b>&nbsp
      								<span>'.$row["firstName"].'</span>
      							</p>
      							<p><b>Posted On:</b>
      								<span>'.$row["date"].'</span>
      							</p>
      						</div>
        				</div>
        			</div>
        		</div>
    			<div class="container">'.$row["content"].'</div>';
							

		}


		$output.='</div>';
		echo $output;
	}
?>

