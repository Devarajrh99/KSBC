<?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 
 $sql = "SELECT * FROM tblcomplaints where ID= $ID";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
	$AMobile=$row['Advocate'];
    $UMobile=$row['Users'];
    $Complaint=$row['Complaint'];
	$AdminReply=$row['AdminReply'];
    $Status=$row['Status'];
 }


 $sql = "SELECT * FROM tbladvocates where Mobile= '$AMobile'";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
	$AName=$row['Name'];
    $AQualification=$row['Qualification'];
    $AAdvocateType=$row['AdvocateType'];
	$AAddressLine1=$row['AddressLine1'];
    $AAddressLine2=$row['AddressLine2'];
    $ATaluk=$row['Taluk'];
    $ADistrict=$row['District'];
	$AMobile=$row['Mobile'];
    $AEmailID=$row['EmailID'];
 }

 $sql = "SELECT * FROM tblusers where Mobile= '$UMobile'";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
	$UName=$row['Name'];
	$UAddressLine1=$row['AddressLine1'];
    $UAddressLine2=$row['AddressLine2'];
    $UTaluk=$row['Taluk'];
    $UDistrict=$row['District'];
	$UMobile=$row['Mobile'];
    $UEmailID=$row['EmailID'];
 }


 if (isset($_POST['btndelete']))
 {
	$sql="DELETE FROM tblcomplaints where ID=$ID";
	$result=execute($sql);	
			 	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminCompliantsList.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}



 ?>




 
<?php
if(isset($_REQUEST['btnsave']))
{

  $insert="UPDATE `tblcomplaints` SET `AdminReply`='".$_REQUEST['txtReply']."',`Status`='Replied' WHERE ID=$ID";
  
  $res=execute($insert);

  if($res)
  {
      echo "<script type='text/javascript'> alert('Successfully Replied');</script>";
      echo "<meta http-equiv='refresh' content='0;url=AdminCompliantsList.php'>";
  }
  else
  {
      echo "<script type='text/javascript'> alert('Query not executed');</script>";
  }	
}
?>




<?php
  include("../Masterpages/AdminHeader.php");
?>
  
   <h1> Complaint Details</h1>

   <button type="button" name="btnBack" onClick="window.location.href='AdminCompliantsList.php'">Back</button>

   <form id="frmadd" name="frmadd" method="post" action="" enctype="multipart/form-data">
   <table id="fulltable">
     
     <tr>
     <th>Advocate </th> <th> <?php echo $AName; ?></th>
     <th>Status</th> <th> <?php echo $Status; ?></th>
    </tr>

    <tr>
    <td>Complaint</td>
	 <td colspan="3"> <?php echo $Complaint; ?></td>
     </tr>

<?php
if($Status!="New")
{
?>
     <tr>
     <td>Admin Reply</td>
	 <td colspan="3"> <?php echo $AdminReply; ?></td>
	</tr>

<?php
}

?>

<?php
if($Status=="New")
{
?>


           	<table id="minitable">
             <tr>
                	<td>Reply</td>
					<td><textarea name="txtReply" maxlength="5000"></textarea></td>
                </tr>
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frmadd)" value="Reply">
                   
                    </td>
                </tr>
           </table>
        


           <?php
}

?>

<table id="displaytable">
              
              <tr>
                <th colspan="4">
Advocate Details
                </th>
</tr>
                 <tr>
                	<td> Name </td>
					<td colspan="3"> <?php echo $AName; ?></td>
                </tr>
                
               
                   <tr>
                	<td> Qualification </td>
                    <td> <?php echo $AQualification; ?></td>
                
                	<td> Advocate Type </td>
                    <td> <?php echo $AAdvocateType; ?></td>
                </tr>
                
                <tr>
                	<td>AddressLine1</td>
                    <td> <?php echo $AAddressLine1; ?></td>
                
                	<td>AddressLine2</td>
                    <td> <?php echo $AAddressLine2; ?></td>
                </tr>
                
                
                <tr>
            	<td>Taluk</td>
                <td> <?php echo $ATaluk; ?></td>
           		
            	<td>District</td>
                <td> <?php echo $ADistrict; ?></td>
           		 </tr>


                      
                <tr>
            	<td>Mobile</td>
                <td> <?php echo $AMobile; ?></td>
           		 
                	<td>Email ID</td>
					<td> <?php echo $AEmailID; ?></td>
                </tr>


                <tr>
                <th colspan="4">
User Details
                </th>
</tr>



                <tr>
                	<td> Name </td>
					<td colspan="3"> <?php echo $UName; ?></td>
                </tr>
                
                <tr>
                	<td>AddressLine1</td>
                    <td> <?php echo $UAddressLine1; ?></td>
            
                	<td>AddressLine2</td>
                    <td> <?php echo $UAddressLine2; ?></td>
                </tr>
                
                
                <tr>
            	<td>Taluk</td>
                <td> <?php echo $UTaluk; ?></td>
           	
            	<td>District</td>
                <td> <?php echo $UDistrict; ?></td>
           		 </tr>


                      
                <tr>
            	<td>Mobile</td>
                <td> <?php echo $UMobile; ?></td>
           	
                	<td>Email ID</td>
					<td> <?php echo $UEmailID; ?></td>
                </tr>

                
                <tr>
                	
                    <td colspan="4" style="text-align:center;">
   
                    <Input type="submit" name="btndelete" value="Delete" onclick="return confirmSubmit()" id="button"/>
                    
                  
                   </td>
                   </tr>
   </table>


   </form>

   
   <?php
  include("../Masterpages/LoginFooter.php");
  ?>
  
  
  

  <script language="javascript">
function check(f)
{
    if(f.txtReply.value=="")
    {
        alert("Reply cannot be empty");
        f.txtReply.focus();
		    return false ;
    }
    
	else
		return true;

}
</script>
