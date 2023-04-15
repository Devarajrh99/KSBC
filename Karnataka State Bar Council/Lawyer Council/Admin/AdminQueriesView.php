<?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 
 $sql = "SELECT * FROM tblqueries where ID= $ID";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
	$AMobile=$row['Advocate'];
    $UMobile=$row['Users'];
    $Query=$row['Query'];
	$AdvocateReply=$row['AdvocateReply'];
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
	$sql="DELETE FROM tblqueries where ID=$ID";
	$result=execute($sql);	
			 	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminQueriesList.php'>";
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
  
   <h1> Query Details</h1>

   <button type="button" name="btnBack" onClick="window.location.href='AdminQueriesList.php'">Back</button>

   
   
 <form id="frm" name="frm" method="post" action="">

   <table id="fulltable">
     
     <tr>
     <th>Advocate </th> <th> <?php echo $AName; ?></th>
     <th>Status</th> <th> <?php echo $Status; ?></th>
    </tr>

    <tr>
    <td>Query</td>
	 <td colspan="3"> <?php echo $Query; ?></td>
     </tr>

<?php
if($Status!="New")
{
?>
     <tr>
     <td>Advocate Reply</td>
	 <td colspan="3"> <?php echo $AdvocateReply; ?></td>
	</tr>

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
  
  
  
