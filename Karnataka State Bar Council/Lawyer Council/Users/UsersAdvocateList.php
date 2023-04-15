  
     
  <?php
  include_once "../DB/db.php";
  include("../MasterPages/UsersHeader.php");
  ?>
  
  <h1>Advocates List</h1>
        
            
  
  <form id="frm" name="frm" method="post" action="">
  <table id="minitable">
	

            <tr>
            <td>District</td>
            <td>
    			 <select name="cmbDistrict" onChange="check1()">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(District) FROM tbladvocates";
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
    			 <select name="cmbTaluk" onChange="check1()">
        		    <option value="0">Select</option>
      				<?php
					   	$sql = "SELECT distinct(Taluk) FROM tbladvocates where District = '". $_REQUEST['cmbDistrict']."'";
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

</table>

</form>


<?php
 if(isset($_REQUEST['cmbTaluk']))
	{
		if($_REQUEST['cmbTaluk']!='0' && $_REQUEST['cmbDistrict']!='0')
		{
            $District=$_REQUEST['cmbDistrict'];
            $Taluk=$_REQUEST['cmbTaluk'];
      ?>

   
<?php

$sql = "SELECT * FROM tbladvocates where District='$District' and Taluk='$Taluk'";

$result=execute($sql);	

if ($result->num_rows > 0) 
{

?>

	 <table id="fulltable">
     
     <tr><th>Name</th>
	 <th>Advocate Type</th>
     <th>Mobile</th>
      <th>View</th>
     </tr>
     
     <?php
while($row = $result->fetch_assoc()) 
  { ?>
     <tr>
      <td> <?php echo $row['Name']; ?></td>
	 <td> <?php echo $row['AdvocateType']; ?></td>
       <td> <?php echo $row['Mobile']; ?></td>
   <td><a class="btn" href="UsersAdvocatesView.php?ID=<?php echo $row['ID']; ?>">View</a></td>
	</tr>
<?php
  }
?>
   </table>
   
    <?php
	}
	else
	{
	   echo "No Records Found";
	}
 

  ?>
  
  <?php
	 }
}
	?>
  
     <?php
  include("../MasterPages/LoginFooter.php");
  ?>
  
  <script type="text/javascript">
function check1() {
     document.frm.submit()
}
</script>
  
  