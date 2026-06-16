<?php

include('../includes/officer_auth.php');
include('../config/database.php');

if(isset($_POST['create'])){

$title=$_POST['title'];

$message=$_POST['message'];

$severity=$_POST['severity'];

$location=$_POST['location'];

$officer=$_SESSION['id'];

mysqli_query($conn,

"INSERT INTO alerts
(title,message,severity,location,created_by)
VALUES
('$title','$message','$severity','$location','$officer')"

);

echo "<div class='alert alert-success'>
Alert Created Successfully
</div>";

}

?>

<form method="POST">

<h2>Create Emergency Alert</h2>

<input
type="text"
name="title"
class="form-control mb-3"
placeholder="Alert Title">

<textarea
name="message"
class="form-control mb-3"></textarea>

<select
name="severity"
class="form-control mb-3">

<option>Low</option>

<option>Medium</option>

<option>High</option>

<option>Critical</option>

</select>

<input
type="text"
name="location"
class="form-control mb-3"
placeholder="Location">

<button
name="create"
class="btn btn-danger">

Create Alert

</button>

</form>