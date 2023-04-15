     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>
  
  <h1>Complaints List</h1>
        
            
<?php

$sql = "SELECT q.ID,q.Query,q.AdvocateReply,q.Status,a.Name FROM tblqueries q,tbladvocates a where q.Advocate=a.Mobile";

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
     <th><a class="btn" href="AdminQueriesView.php?ID=<?php echo $row['ID']; ?>">View</a></th>
    </tr>

    <tr>
    <td>Complaint</td>
	 <td colspan="4"> <?php echo $row['Query']; ?></td>
     </tr>

<?php
if($row['Status']!="New")
{
?>
     <tr>
     <td>Advocate Reply</td>
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
  

  