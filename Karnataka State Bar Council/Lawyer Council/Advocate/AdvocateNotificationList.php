     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdvocateHeader.php");
  ?>

  <h1>Notification List</h1>
      
<?php

$sql = "SELECT * FROM tblnotification order by NotificationDate";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
    
     <th>Date </th> <th> <?php $d=date('d-m-Y', strtotime($row['NotificationDate'])); echo $d; ?> </th>
   
    </tr>

    <tr>
	 <td colspan="2"> <?php echo $row['Notification']; ?></td>
     </tr>
<?php
  }
?>
   </table>
   
    <?php
	}
	else
	{
	   echo "No Records Found";
	}
 

  ?>
  
  
     <?php
  include("../MasterPages/LoginFooter.php");
  ?>
  

  