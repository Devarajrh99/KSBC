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

   <button type="button" name="btnBack" onClick="window.location.href='UsersAdvocatesView.php?ID=<?php echo $ID; ?>'">Back</button>
 
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
           </table>


            <form id="frmadd" name="frmadd" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
             <tr>
                	<td>Query</td>
					<td><textarea name="txtQuery" maxlength="5000"></textarea></td>
                </tr>
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frmadd)" value="Post">
                   
                    </td>
                </tr>
           </table>
           </form>


  
   <?php
  include("../Masterpages/LoginFooter.php");
  ?>
  
  
  
 
<?php
if(isset($_REQUEST['btnsave']))
{

  $insert="INSERT INTO `tblqueries`(`Advocate`, `Users`, `Query`, `AdvocateReply`, `Status`) 
  VALUES ('$Mobile', $UserID,'".$_REQUEST['txtQuery']."','','New')";
  
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
    if(f.txtQuery.value=="")
    {
        alert("Query cannot be empty");
        f.txtQuery.focus();
		    return false ;
    }
    
	else
		return true;

}
</script>
