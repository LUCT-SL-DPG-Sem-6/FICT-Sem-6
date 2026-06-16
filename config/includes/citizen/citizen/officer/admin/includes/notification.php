<?php

function createNotification(
$conn,
$user_id,
$title,
$message
){

mysqli_query($conn,

"INSERT INTO notifications
(user_id,title,message)
VALUES
('$user_id','$title','$message')"

);

}
include('../includes/notification.php');

$getUser=mysqli_query($conn,
"SELECT user_id FROM incidents
WHERE id='$id'");

$row=mysqli_fetch_assoc($getUser);

$user_id=$row['user_id'];

createNotification(

$conn,
$user_id,

'Incident Status Updated',

'Your incident report has been updated to '.$status

);
?>