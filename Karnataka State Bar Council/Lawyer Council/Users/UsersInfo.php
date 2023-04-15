<?php

  session_start();       
  $UserID=$_SESSION['UserID'];

  include_once "../DB/db.php";

 $result = execute("SELECT * FROM tblusers where Mobile= '$UserID'");
 if($row = mysqli_fetch_array($result))
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

if (isset($_POST['btnupdate']))
{
    $sql="Update tblusers SET Name='".$_REQUEST['txtName']."',AddressLine1='".$_REQUEST['txtAddressLine1']."',
    AddressLine2='".$_REQUEST['txtAddressLine2']."',EmailID='".$_REQUEST['txtEmailID']."' where ID=$ID";
	execute($sql);
    
  echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
  echo "<meta http-equiv='refresh' content='0;url=UsersInfo.php'>";
}
		
include("../MasterPages/UsersHeader.php");
  ?>
  
  <h1>User Details</h1>
  
   
 <form id="frmview" name="frmview" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td style="width:40%;">ID </td>
                    <td><?php echo $ID; ?></td>
                </tr>
                
                     
                <tr>
                	<td>Name</td>
                    <td><label id="l1"><?php echo $Name; ?></label>
                    <input type="text" name="txtName" class="hide" value="<?php echo $Name; ?>" maxlength="100" "/>
                  </td>
                </tr>

                <tr>
                	<td>AddressLine1</td>
                    <td><label id="l3"><?php echo $AddressLine1; ?></label>
                    <input type="text" name="txtAddressLine1" class="hide" value="<?php echo $AddressLine1; ?>" maxlength="100" "/>
                  </td>
                </tr>
                
                <tr>
                	<td>AddressLine2</td>
                    <td><label id="l4"><?php echo $AddressLine2; ?></label>
                    <input type="text" name="txtAddressLine2" class="hide" value="<?php echo $AddressLine2; ?>" maxlength="100" "/>
                  </td>
                </tr>
                

                <tr>
            <td>Taluk</td>
            <td>
            <?php echo $Taluk; ?>
                        </td>
            </tr>
            
          
        
            <tr>
            <td>District</td>
            <td>
            <?php echo $District; ?>
                        </td>
            </tr>

            <tr>
                	<td>Mobile</td>
                    <td><?php echo $Mobile; ?></td>
                </tr>

             
            <tr>
                	<td>EmailID</td>
                    <td><label id="l5"><?php echo $EmailID; ?></label>
                    <input type="text" name="txtEmailID" class="hide" value="<?php echo $EmailID; ?>" maxlength="100" />
                  </td>
                </tr>

            
                <tr>
                <td>
               
               <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frmview)" id="button"/></td>
               <td>
             <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
            
             <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
              </td>
                </tr>
           </table>
           </form>



<?php
  include("../MasterPages/Footer.php");
?>
  
<style type="text/css">
input {display:block;}
.hide {display:none;} 

textarea {display:block;}
</style>


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



