<?php

include('../includes/admin_auth.php');
include('../config/database.php');

if(isset($_POST['save'])){

$name=$_POST['agency_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];

mysqli_query($conn,

"INSERT INTO emergency_contacts
(agency_name,phone,email,address)
VALUES
('$name','$phone','$email','$address')");

}

?>

<div class="container mt-5">

<h2>Emergency Contacts</h2>

<form method="POST">

<input type="text"
name="agency_name"
class="form-control mb-2"
placeholder="Agency Name">

<input type="text"
name="phone"
class="form-control mb-2"
placeholder="Phone">

<input type="email"
name="email"
class="form-control mb-2"
placeholder="Email">

<textarea
name="address"
class="form-control mb-2"></textarea>

<button
name="save"
class="btn btn-success">

Save Contact

</button>

</form>

</div>