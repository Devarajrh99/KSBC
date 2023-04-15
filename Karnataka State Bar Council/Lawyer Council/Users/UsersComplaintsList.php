<?php
   session_start();
         
   $UserID=$_SESSION['UserID'];
?>
     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/UsersHeader.php");
  ?>
  
  <h1>Complaints List</h1>
        
            
<?php

$sql = "SELECT c.ID,c.Complaint,c.AdminReply,c.Status,a.Name FROM tblcomplaints c,tbladvocates a where c.Users='$UserID' and c.Advocate=a.Mobile";

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
    <td>Complaint</td>
	 <td colspan="3"> <?php echo $row['Complaint']; ?></td>
     </tr>

<?php
if($row['Status']!="New")
{
?>
     <tr>
     <td>Admin Reply</td>
	 <td colspan="3"> <?php echo $row['AdminReply']; ?></td>
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
  
  <script type="text/javascript">
function check1() {
     document.frm.submit()
}
</script>
  
  