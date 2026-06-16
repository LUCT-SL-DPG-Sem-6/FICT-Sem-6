<?php

include('../config/database.php');
include('../includes/mail.php');

$users=mysqli_query($conn,
"SELECT email FROM users");

while($user=mysqli_fetch_assoc($users)){

sendEmail(

$user['email'],

'Emergency Alert',

'Please check the Disaster Alert System for a new emergency alert.'

);

}

echo "Emails Sent";

?>