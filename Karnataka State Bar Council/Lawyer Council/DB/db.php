<?php 

function execute($sql)
{
$con=mysqli_connect('localhost','root','','ksbc');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

//$res=mysqli_query($con,$sql);


$res = $con->query($sql);

/* close connection */
$con->close();

return $res;
}


function NumRows($sql)
{
    $res=execute($sql);
    $count=$res->num_rows;
    
    return $count;
}


?>