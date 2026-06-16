<?php

include('../includes/officer_auth.php');
include('../config/database.php');

$id=$_GET['id'];

if(isset($_POST['update'])){

$status=$_POST['status'];

mysqli_query($conn,
"UPDATE incidents
SET status='$status'
WHERE id='$id'");

header("Location:view_incidents.php");

}

?>

<form method="POST">

<h3>Update Incident Status</h3>

<select name="status">

<option>Pending</option>

<option>Verified</option>

<option>Resolved</option>

</select>

<button name="update">

Save

</button>

</form>