<?php
   session_start();
         
   $UserID=$_SESSION['UserID'];
?>
     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdvocateHeader.php");
  ?>
  
  <h1>Queries List</h1>
        
            
<?php

$sql = "SELECT q.ID,q.Query,q.AdvocateReply,q.Status,u.Name FROM tblqueries q,tblusers u where q.Advocate='$UserID' and q.Users=u.Mobile";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
    
     <th>User Name </th> <th> <?php echo $row['Name']; ?></th>
     <th>Status</th> <th> <?php echo $row['Status']; ?></th>
     <th><a class="btn" href="AdvocateQueriesView.php?ID=<?php echo $row['ID']; ?>">View</a></th>
    </tr>

    <tr>
    <td>Query</td>
	 <td colspan="4"> <?php echo $row['Query']; ?></td>
     </tr>

<?php
if($row['Status']!="New")
{
?>
     <tr>
     <td>Reply</td>
	 <td colspan="4"> <?php echo $row['AdvocateReply']; ?></td>
	</tr>

<?php
}

?>


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
  