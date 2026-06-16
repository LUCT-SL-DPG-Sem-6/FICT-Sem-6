<?php

include('config/database.php');

include('includes/mail.php');

if(isset($_POST['submit'])){

$email=$_POST['email'];

$token=md5(rand());

mysqli_query($conn,

"INSERT INTO password_resets
(email,token)
VALUES
('$email','$token')"

);

$link=

"http://localhost/
Disaster-Alert-System/
reset_password.php?
token=".$token;

sendEmail(

$email,

'Password Reset',

'Click the link:
'.$link

);

echo "Reset Link Sent";

}

?>

<form method="POST">

<input
type="email"
name="email">

<button
name="submit">

Reset Password

</button>

</form>