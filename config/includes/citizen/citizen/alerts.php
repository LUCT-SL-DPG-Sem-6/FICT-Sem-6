<?php

include(__DIR__ . '/../../citizen_auth.php');
include(__DIR__ . '/../../../database.php');

$result=mysqli_query($conn,
"SELECT * FROM alerts
ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html>
<head>

<title>Emergency Alerts</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Emergency Alerts</h2>

<?php

while($alert=mysqli_fetch_assoc($result)){

?>

<div class="alert alert-danger">

<h4>
<?php echo $alert['title']; ?>
</h4>

<p>
<?php echo $alert['message']; ?>
</p>

<strong>Severity:</strong>
<?php echo $alert['severity']; ?>

<br>

<strong>Location:</strong>
<?php echo $alert['location']; ?>

</div>

<?php

}

?>

</div>

</body>
</html>