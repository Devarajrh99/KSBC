  
  <?php
  include("../MasterPages/AdminHeader.php");
  ?>

<h1>Add Advocate Types</h1>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Advocate Type</td>
					<td><input type="text" name="txtAdvocateType" maxlength="100"/></td>
                </tr>
       		
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm)" value="Save">
                    <button type="button" name="btncancel" onClick="window.location.href='AdminAdvocateTypesList.php'">Cancel</button>
   	
                    </td>
                </tr>
           </table>
           </form>
  
  
       

<?php
  include("../MasterPages/LoginFooter.php");
?>
  
   <?php
if(isset($_REQUEST['btnsave']))
{

include_once "../DB/db.php";

$insert="INSERT INTO `tbladvocatetypes`(`AdvocateType`) VALUES 
					  ('".$_REQUEST['txtAdvocateType']."')";
$res=execute($insert);

if($res)
{
echo "<script type='text/javascript'> alert('Successfully Inserted');</script>";
echo "<meta http-equiv='refresh' content='0;url=AdminAdvocateTypesList.php'>";
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
  if(f.txtAdvocateType.value=="")
   {
        alert("Advocate Type cannot be empty");
        f.txtAdvocateType.focus();
		return false ;
    }
	else
		return true;

}
</script>
