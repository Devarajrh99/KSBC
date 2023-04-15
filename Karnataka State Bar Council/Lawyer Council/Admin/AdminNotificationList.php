     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>

<?php
include_once "../DB/db.php";

if(isset($_GET['Mode'] ))
{
	if($_GET['Mode'] =="Delete") 
	{
		$sqldel="Delete from tblnotification where ID='".$_REQUEST['ID']."' ";
		$ress=execute($sqldel);	
	
		if($ress)
		{
			echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			echo "<meta http-equiv='refresh' content='0;url=AdminNotificationList.php'>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Action not processed');</script>";
		}
	}
}

?>
  
  <h1>Notification List</h1>


  <button type="button" name="btnBack" onClick="window.location.href='AdminNotificationPost.php'">Post Notification</button>

            
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
     <th><a href="AdminNotificationList.php?ID=<?php echo $row['ID']; ?>&Mode=Delete" onClick="return confirm(' Are You Sure To Delete? ');" >
  Delete</a>	 </th>
    </tr>

    <tr>
	 <td colspan="3"> <?php echo $row['Notification']; ?></td>
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
  

  