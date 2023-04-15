   
  <?php
include_once "../DB/db.php";

 $ID=$_GET['ID'];
 
 $sql = "SELECT * FROM tbladvocates where ID= $ID";
 $result=execute($sql);	
 if($row = $result->fetch_assoc())
 {
 	$ID=$row['ID'];
	$Name=$row['Name'];
    $Qualification=$row['Qualification'];
    $AdvocateType=$row['AdvocateType'];
	$AddressLine1=$row['AddressLine1'];
    $AddressLine2=$row['AddressLine2'];
    $Taluk=$row['Taluk'];
    $District=$row['District'];
	$Mobile=$row['Mobile'];
    $EmailID=$row['EmailID'];
    $Status=$row['Status'];
 }

 if (isset($_POST['btndelete']))
 {
	$sql="DELETE FROM tbladvocates where ID=$ID";
	$result=execute($sql);	
			 
	$sql="DELETE FROM tbllogin where UserID='$Mobile'";
	$result=execute($sql);	
	if($result)
	{
		echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminAdvocatesList.php'>";
	}
	else
	{
		echo "<script type='text/javascript'> alert('Action not processed');</script>";
	}
}
		
if (isset($_POST['btnapprove']))
{
		
    $sql="Update tbladvocates SET Status='Approved' where ID=$ID";
    $result=execute($sql);	
    
    
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$VerificationCode = substr(str_shuffle( $chars ), 0, 4);

$mobileno=$Mobile;
$str="Your User ID is ".$Mobile." and Password is ".$VerificationCode;


$sql="INSERT INTO `tbllogin`(`UserID`, `Password`, `UserType`) VALUES ('$Mobile','$VerificationCode','Advocate')";

$res=execute($sql);	



	if($res)
	{
        //include_once "../SMS/SendSMS.php";
     //   $res=sendSMS($mobileno,$str);
    
		echo "<script type='text/javascript'> alert('$str');</script>";
		echo "<meta http-equiv='refresh' content='0;url=AdminAdvocatesList.php'>";
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
  
   <h1> Advocate Details</h1>

   <button type="button" name="btnBack" onClick="window.location.href='AdminAdvocatesList.php'">Back</button>

 
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
                	<td> Qualification </td>
                    <td> <?php echo $Qualification; ?></td>
                </tr>

                <tr>
                	<td> Advocate Type </td>
                    <td> <?php echo $AdvocateType; ?></td>
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
                	<td>Status</td>
					<td> <?php echo $Status; ?></td>
                </tr>

                
             <tr>
                	  <td>
                      
                      <?php 
                      if($Status=="New")
                      {
                          ?>
<Input type="submit" name="btnapprove" value="Approve" id="button"/>
                 
                          <?php
                      }
                      ?>
                      
                               
                </td>
                 <td>

                 <Input type="submit" name="btndelete" value="Delete" onclick="return confirmSubmit()" id="button"/>
                 
               
                </td>
                </tr>
                
           </table>
           </form>
  
   <?php
  include("../Masterpages/LoginFooter.php");
  ?>
  
  
  
