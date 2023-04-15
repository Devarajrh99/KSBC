<?php

  session_start();       
  $UserID=$_SESSION['UserID'];

  include_once "../DB/db.php";

 $result = execute("SELECT * FROM tbladvocates where Mobile= '$UserID'");
 if($row = mysqli_fetch_array($result))
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

}

if (isset($_POST['btnupdate']))
{
    $sql="Update tbladvocates SET Name='".$_REQUEST['txtName']."',Qualification='".$_REQUEST['cmbQualification']."',
    AdvocateType='".$_REQUEST['cmbAdvocateType']."',AddressLine1='".$_REQUEST['txtAddressLine1']."',
    AddressLine2='".$_REQUEST['txtAddressLine2']."',EmailID='".$_REQUEST['txtEmailID']."' where ID=$ID";
	execute($sql);
    
  echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
  echo "<meta http-equiv='refresh' content='0;url=AdvocateInfo.php'>";
}
		
include("../MasterPages/AdvocateHeader.php");
  ?>
  
  <h1>Advocate Details</h1>
  
   
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
                	<td>Qualification</td>
					<td>
                    <label id="l2"><?php echo $Qualification; ?></label>
                    <select name="cmbQualification" class="hide">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(Qualification) FROM tblqualification";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				           
                            <option value="<?php echo $result['Qualification']; ?>" <?php if($Qualification==$result['Qualification']) echo 'selected="selected"'; ?> ><?php echo $result['Qualification']; ?></option>                            
        				<?php
        		
							}
					
						?>
                        </select>


                    </td>
                </tr>


                <tr>
                	<td>Advocate Type</td>
					<td>
                    <label id="l3"><?php echo $AdvocateType; ?></label>
                    <select name="cmbAdvocateType" class="hide">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(AdvocateType) FROM tbladvocatetypes";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				             <option value="<?php echo $result['AdvocateType']; ?>" <?php if($AdvocateType==$result['AdvocateType']) echo 'selected="selected"'; ?> ><?php echo $result['AdvocateType']; ?></option>                            
                                                        
        				<?php
        		
							}
					
						?>
                        </select>


                    </td>
                </tr>


                <tr>
                	<td>AddressLine1</td>
                    <td><label id="l4"><?php echo $AddressLine1; ?></label>
                    <input type="text" name="txtAddressLine1" class="hide" value="<?php echo $AddressLine1; ?>" maxlength="100" "/>
                  </td>
                </tr>
                
                <tr>
                	<td>AddressLine2</td>
                    <td><label id="l5"><?php echo $AddressLine2; ?></label>
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
                    <td><label id="l6"><?php echo $EmailID; ?></label>
                    <input type="text" name="txtEmailID" class="hide" value="<?php echo $EmailID; ?>" maxlength="100" />
                  </td>
                </tr>

            
                <tr>
                <td>
                <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
            
               <td>
             <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
             <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frmview)" id="button"/></td>
            
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
    else if(f.cmbQualification.value.trim()=="0")
   {
        alert("Select Qualification");
        f.cmbQualification.focus();
		return false ;
    }
    else if(f.cmbAdvocateType.value.trim()=="0")
   {
        alert("Select Advocate Type");
        f.cmbAdvocateType.focus();
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



