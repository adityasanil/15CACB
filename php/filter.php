<?php

include 'connectionDb15CACB.php';

 if(isset($_GET["from_date"], $_GET["to_date"]))  
 {  
  
      $output = '';  
      $query = "  
                SELECT DISTINCT Users.userName, Users.id, Users.identity, Users.firstName, Users.lastName, Users.email, Users.contact, documentStore.transactionDate FROM Users , documentStore
                WHERE Users.id = documentStore.id AND documentStore.identityUser= 'client' AND  documentStore.transactionDate BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."'"; 
    
     $result = mysqli_query($connect, $query);  
     $output .= '  
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Transaction Count</th>
                    </tr>
                </thead>
                <tbody>
           
      ';

    if(mysqli_num_rows($result) > 0)  
      {     
           $number = 1;
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $number.'</td>  
                          <td><a class="client_data" href="#" id="' . $row['id'] . '">'. $row["firstName"] .' '.$row["lastName"].' </a></td>  
                          <td>'. $row["userName"] .'</td>  
                          <td><a href="mailto:' . $row['email'] . '">'. $row['userName'] .'</a></td> ' ;
                    
                    $sql = "SELECT  * FROM documentStore WHERE userName = '" . $row['userName'] . "' AND documentStore.transactionDate BETWEEN '".$_GET["from_date"]."' AND '".$_GET["to_date"]."'";
                    $count = mysqli_query($connect, $sql);
                    $countTranscation = mysqli_num_rows($count);

                $output .='
                          <td>' . $countTranscation . '</td>
                    </tr> ';
                $number++;




                
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td>No Records Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</tbody></table>';  
      echo $output;        

 }  


 ?>
