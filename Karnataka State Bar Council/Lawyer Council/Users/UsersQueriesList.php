<?php
   session_start();
         
   $UserID=$_SESSION['UserID'];
?>
     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/UsersHeader.php");
  ?>
  
  <h1>Queries List</h1>
        
            
<?php

$sql = "SELECT q.ID,q.Query,q.AdvocateReply,q.Status,a.Name FROM tblqueries q,tbladvocates a where q.Users='$UserID' and q.Advocate=a.Mobile";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
    
     <th>Advocate </th> <th> <?php echo $row['Name']; ?></th>
     <th>Status</th> <th> <?php echo $row['Status']; ?></th>
    
    </tr>

    <tr>
    <td>Query</td>
	 <td colspan="3"> <?php echo $row['Query']; ?></td>
     </tr>

<?php
if($row['Status']!="New")
{
?>
     <tr>
     <td>Reply</td>
	 <td colspan="3"> <?php echo $row['AdvocateReply']; ?></td>
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
  