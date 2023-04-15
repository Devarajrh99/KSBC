  
<?php

include_once "DB/db.php";

include_once "MasterPages/Header.php";

?>

<h2>User Registration</h2>
 
 <form id="frm" name="frm" method="post" action="">
           	<table id="fulltable">

               <tr>
                	<td>Name</td>
					<td><input type="text" name="txtName" maxlength="100" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : ''; ?>"  /></td>
                </tr>

              
              
                <tr>
                	<td>Address Line1</td>
					<td><input type="text" name="txtAddressLine1" maxlength="100"  value="<?php echo isset($_POST['txtAddressLine1']) ? $_POST['txtAddressLine1'] : ''; ?>"  /></td>
                </tr>

                <tr>
                	<td>Address Line2</td>
					<td><input type="text" name="txtAddressLine2" maxlength="100" value="<?php echo isset($_POST['txtAddressLine2']) ? $_POST['txtAddressLine2'] : ''; ?>" /></td>
                </tr>

                <tr>
            <td>District</td>
            <td>
    			 <select name="cmbDistrict" onChange="check1()">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(District) FROM tblcity";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbDistrict']) ? (($_REQUEST['cmbDistrict']== $result['District']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['District']?>"><?php echo $result['District'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>
                        </select>
                        </td>
            </tr>
            
          
          
<?php
			if(isset($_REQUEST['cmbDistrict']))
	{
		if($_REQUEST['cmbDistrict']!='0')
		{
		?>

            <tr>
            <td>Taluk</td>
            <td>
           
    			 <select name="cmbTaluk">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(Taluk) FROM tblcity where District = '". $_REQUEST['cmbDistrict']."'";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbTaluk']) ? (($_REQUEST['cmbTaluk']== $result['Taluk']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['Taluk']?>"><?php echo $result['Taluk'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>
                        </select>
                          
                        </td>
            </tr>

            <?php
	 }
}
	?>

              <tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" maxlength="10"  onKeyPress="return numbersonly(event, false)" value="<?php echo isset($_POST['txtMobile']) ? $_POST['txtMobile'] : ''; ?>" /></td>
                </tr>
				
				<tr>
                	<td>Email ID</td>
					<td><input type="text" name="txtEmailID" maxlength="100" value="<?php echo isset($_POST['txtEmailID']) ? $_POST['txtEmailID'] : ''; ?>" /></td>
                </tr>
       		
                <tr>
                	<td colspan="2" style="text-align:center;">
                    <input type="submit" name="btnsave" onClick="return check(frm)" value="Save">
                    <button type="button" name="btncancel" onClick="window.location.href='Login.php'">Cancel</button>
   	
                    </td>
                </tr>
           </table>
           </form>
  
  
       

<?php
  include("MasterPages/Footer.php");
?>
  
   <?php
if(isset($_REQUEST['btnsave']))
{

$sql="select * from tbllogin where UserID='".$_REQUEST['txtMobile']."'";

$count=NumRows($sql);

if($count>0)
{
    echo "<script type='text/javascript'> alert('Mobile alredy exist');</script>";
}
else
{

$insert="INSERT INTO `tblusers`( `Name`, `AddressLine1`, `AddressLine2`, `Taluk`, `District`, 
`Mobile`, `EmailID`) VALUES ('".$_REQUEST['txtName']."','".$_REQUEST['txtAddressLine1']."','".$_REQUEST['txtAddressLine2']."',
'".$_REQUEST['cmbTaluk']."','".$_REQUEST['cmbDistrict']."','".$_REQUEST['txtMobile']."','".$_REQUEST['txtEmailID']."')";
$res=execute($insert);



$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$VerificationCode = substr(str_shuffle( $chars ), 0, 4);

$mobileno=$_REQUEST['txtMobile'];
$str="Your User ID is ".$_REQUEST['txtMobile']." and Password is ".$VerificationCode;


$sql="INSERT INTO `tbllogin`(`UserID`, `Password`, `UserType`) VALUES ('".$_REQUEST['txtMobile']."','$VerificationCode','Users')";

$res=execute($sql);	



if($res)
{
    //include_once "../SMS/SendSMS.php";
   // $res=sendSMS($mobileno,$str);

    
    echo "<script type='text/javascript'> alert('$str');</script>";
    echo "<meta http-equiv='refresh' content='0;url=Login.php'>";
}
else
{
echo "<script type='text/javascript'> alert('Query not executed');</script>";
}	
}
}

?>



<script language="javascript">
function check(f)
{
  if(f.txtName.value.trim()=="")
   {
        alert("Enter Name");
        f.txtName.focus();
		return false ;
    }
    else if(f.txtAddressLine1.value.trim()=="")
   {
        alert("Enter Address Line 1");
        f.txtAddressLine1.focus();
		return false ;
    }
    else if(f.cmbDistrict.value=="0")
   {
        alert("Select District");
        f.cmbDistrict.focus();
		return false ;
    }
  
    else if(f.cmbTaluk.value=="0")
   {
        alert("Select Taluk");
        f.cmbTaluk.focus();
		return false ;
    }
  
    else if (f.txtMobile.value.trim()=="" || checkmobile(f.txtMobile)==false)
{
alert("This Mobile field can not be empty");
f.txtMobile.focus();
return false ;
}

else if (f.txtEmailID.value.trim()=="" || checkemail(f.txtEmailID)==false)
{
alert("This Email ID field can not be empty");
f.txtEmailID.focus();
return false ;
}
	else
		return true;

}
</script>

<script type="text/javascript">
function check1() {
     document.frm.submit()
}
</script>
  
  