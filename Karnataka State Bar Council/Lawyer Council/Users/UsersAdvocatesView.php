<?php
   session_start();
         
   $UserID=$_SESSION['UserID'];
?>

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

 ?>


<?php
  include("../Masterpages/UsersHeader.php");
?>
  
   <h1> Advocate Details</h1>

   <button type="button" name="btnBack" onClick="window.location.href='UsersAdvocateList.php'">Back</button>

   <button type="button" name="btnReportComplaint" onClick="window.location.href='UsersComplaintReport.php?ID=<?php echo $ID; ?>'">Report Complaint</button>

   <button type="button" name="btnReportQuery" onClick="window.location.href='UsersQueriesReport.php?ID=<?php echo $ID; ?>'">Ask Query</button>

 
 <form id="frm" name="frm" method="post" action="">
           	<table id="displaytable">
                 <tr>
                	<td>ID </td>
                    <td><?php echo $ID; ?> </td>
               
                	<td> Name </td>
					<td> <?php echo $Name; ?></td>
                </tr>
                
               
                   <tr>
                	<td> Qualification </td>
                    <td> <?php echo $Qualification; ?></td>
               
                	<td> Advocate Type </td>
                    <td> <?php echo $AdvocateType; ?></td>
                </tr>
                
                <tr>
                	<td>AddressLine1</td>
                    <td> <?php echo $AddressLine1; ?></td>
               
                	<td>AddressLine2</td>
                    <td> <?php echo $AddressLine2; ?></td>
                </tr>
                
                
                <tr>
            	<td>Taluk</td>
                <td> <?php echo $Taluk; ?></td>
           	
            	<td>District</td>
                <td> <?php echo $District; ?></td>
           		 </tr>


                      
                <tr>
            	<td>Mobile</td>
                <td> <?php echo $Mobile; ?></td>
           		
                	<td>Email ID</td>
					<td> <?php echo $EmailID; ?></td>
                </tr>

                <tr>
                	<td>Status</td>
					<td> <?php echo $Status; ?></td>
                </tr>     
           </table>


           <?php
	$sql = "SELECT f.FeedBack,u.Name FROM tblfeedback f,tblUsers u where f.Advocate='$Mobile' and f.Users=u.Mobile";
	$result = execute($sql);
?>

	<table id="displaytable">
     

    <?php
while($row = mysqli_fetch_array($result))
  { ?>

<tr>

  	 <th>User Name</th>
     <th> <?php echo $row['Name']; ?> </th>
 </tr>
     
 
<tr>
<td colspan="2"> <?php echo $row['FeedBack']; ?> </td>
</tr>

<?php
  }
?>
   </table>






   <form id="frmadd" name="frmadd" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
             <tr>
                	<td>Feedback</td>
					<td><textarea name="txtFeedBack" maxlength="5000"></textarea></td>
                </tr>
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frmadd)" value="Save">
                   
                    </td>
                </tr>
           </table>
           </form>


           </form>
  
   <?php
  include("../Masterpages/LoginFooter.php");
  ?>
  
  
  
 
<?php
if(isset($_REQUEST['btnsave']))
{

  $insert="INSERT INTO `tblfeedback`(`Advocate`, `Users`, `FeedBack`) 
  VALUES ('$Mobile', $UserID,'".$_REQUEST['txtFeedBack']."')";
  
  $res=execute($insert);

  if($res)
  {
      echo "<script type='text/javascript'> alert('Successfully Posted');</script>";
      echo "<meta http-equiv='refresh' content='0;url=UsersAdvocatesView.php?ID=$ID'>";
  }
  else
  {
      echo "<script type='text/javascript'> alert('Query not executed');</script>";
  }	
}
?>



<script language="javascript">
function check(f)
{
    if(f.txtFeedBack.value=="")
    {
        alert("Feedback cannot be empty");
        f.txtFeedBack.focus();
		    return false ;
    }
    
	else
		return true;

}
</script>
