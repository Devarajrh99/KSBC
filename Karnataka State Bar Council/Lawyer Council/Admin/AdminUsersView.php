   
  <?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 
 $sql = "SELECT * FROM tblusers where ID= $ID";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
 	$ID=$row['ID'];
	$Name=$row['Name'];
	$AddressLine1=$row['AddressLine1'];
    $AddressLine2=$row['AddressLine2'];
    $Taluk=$row['Taluk'];
    $District=$row['District'];
	$Mobile=$row['Mobile'];
    $EmailID=$row['EmailID'];
 }

 if (isset($_POST['btndelete']))
 {
	$sql="DELETE FROM tblusers where ID=$ID";
	$result=execute($sql);	
			 
	$sql="DELETE FROM tbllogin where UserID='$Mobile'";
	$result=execute($sql);	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminUsersList.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
		?>

<?php
  include("../Masterpages/AdminHeader.php");
?>
  
   <h1> Users Details</h1>

   <button type="button" name="btnBack" onClick="window.location.href='AdminUsersList.php'">Back</button>

 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
                 <tr>
                	<td>ID </td>
                    <td><?php echo $ID; ?> </td>
                </tr>
                
                 <tr>
                	<td> Name </td>
					<td> <?php echo $Name; ?></td>
                </tr>
                
                <tr>
                	<td>AddressLine1</td>
                    <td> <?php echo $AddressLine1; ?></td>
                </tr>
                
                <tr>
                	<td>AddressLine2</td>
                    <td> <?php echo $AddressLine2; ?></td>
                </tr>
                
                
                <tr>
            	<td>Taluk</td>
                <td> <?php echo $Taluk; ?></td>
           		 </tr>


                <tr>
            	<td>District</td>
                <td> <?php echo $District; ?></td>
           		 </tr>


                      
                <tr>
            	<td>Mobile</td>
                <td> <?php echo $Mobile; ?></td>
           		 </tr>


                	<tr>
                	<td>Email ID</td>
					<td> <?php echo $EmailID; ?></td>
                </tr>

                
             <tr>
                	
                 <td colspan="2" style="text-align:center;">

                 <Input type="submit" name="btndelete" value="Delete" onclick="return confirmSubmit()" id="button"/>
                 
               
                </td>
                </tr>
                
           </table>
           </form>
  
   <?php
  include("../Masterpages/LoginFooter.php");
  ?>
  
  
  
