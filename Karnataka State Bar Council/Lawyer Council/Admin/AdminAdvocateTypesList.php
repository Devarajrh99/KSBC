
<?php
include_once "../DB/db.php";

if(isset($_GET['Mode'] ))
{
	if($_GET['Mode'] =="Delete") 
	{
		$sqldel="Delete from tbladvocatetypes where ID='".$_REQUEST['ID']."' ";
		$ress=execute($sqldel);	
	
		if($ress)
		{
			echo "<script type='text/javascript'> alert('Deleted Successfully');</script>";
			echo "<meta http-equiv='refresh' content='0;url=AdminAdvocateTypesList.php'>";
		}
		else
		{
			echo "<script type='text/javascript'> alert('Action not processed');</script>";
		}
	}
}

?>



<?php
  include("../MasterPages/AdminHeader.php");
  ?>
<h1>Advocate Types</h1>


<button type="button" name="btnadd" onClick="window.location.href='AdminAdvocateTypesAdd.php'">Add Type</button>

<?php
	$sql = "SELECT * FROM tbladvocatetypes";
	$result = execute($sql);
?>

	<table id="minitable">
     
     <tr><th>ID</th>
	 <th>Advocate Type</th>
     <th>Delete</th>
     </tr>
     
     <?php
while($row = mysqli_fetch_array($result))
  { ?>
     <tr>
      <td> <?php echo $row['ID']; ?></td>
	 <td> <?php echo $row['AdvocateType']; ?></td>
   <td><a href="AdminAdvocateTypesList.php?ID=<?php echo $row['ID']; ?>&Mode=Delete" onClick="return confirm(' Are You Sure To Delete? ');" >
  Delete</a>	 </td>
	</tr>
<?php
  }
?>
   </table>


<?php
  include("../MasterPages/Footer.php");
?>