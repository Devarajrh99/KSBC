     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/AdminHeader.php");
  ?>
   <h1> Advocate Details</h1>

   <button type="button" name="btnBack" onClick="window.location.href='AdminNotificationList.php'">Back</button>
 
 <form id="frm" name="frm" method="post" action="">

            <form id="frmadd" name="frmadd" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
             <tr>
                	<td>Notification</td>
					<td><textarea name="txtNotification" maxlength="5000"></textarea></td>
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

    $NotificationDate=date("Y-m-d");

  $insert="INSERT INTO `tblnotification`(`Notification`, `NotificationDate`) 
  VALUES ('".$_REQUEST['txtNotification']."','$NotificationDate')";
  
  $res=execute($insert);

  if($res)
  {
      echo "<script type='text/javascript'> alert('Successfully Posted');</script>";
      echo "<meta http-equiv='refresh' content='0;url=AdminNotificationList.php'>";
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
    if(f.txtNotification.value=="")
    {
        alert("Notification cannot be empty");
        f.txtNotification.focus();
		    return false ;
    }
    
	else
		return true;

}
</script>
