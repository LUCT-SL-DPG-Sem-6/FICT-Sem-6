<?php

include('../includes/citizen_auth.php');
include('../config/database.php');

$user=$_SESSION['id'];

$result=mysqli_query($conn,

"SELECT * FROM notifications
WHERE user_id='$user'
ORDER BY created_at DESC"

);

?>

<!DOCTYPE html>
<html>
<head>

<title>Notifications</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>My Notifications</h2>

<?php

while($note=mysqli_fetch_assoc($result)){

?>

<div class="alert alert-info">

<h5>

<?php echo $note['title']; ?>

</h5>

<p>

<?php echo $note['message']; ?>

</p>

<small>

<?php echo $note['created_at']; ?>

</small>

</div>

<?php } ?>

</div>

</body>
</html>