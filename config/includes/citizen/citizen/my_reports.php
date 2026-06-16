<?php

include(__DIR__ . '/../../citizen_auth.php');
include(__DIR__ . '/../../../database.php');

$user_id=$_SESSION['id'];

$result=mysqli_query($conn,
"SELECT * FROM incidents
WHERE user_id='$user_id'
ORDER BY reported_at DESC");

?>

<!DOCTYPE html>
<html>
<head>

<title>My Reports</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>My Incident Reports</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>

<th>Type</th>

<th>Location</th>

<th>Status</th>

<th>Date</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['incident_type']; ?></td>

<td><?php echo $row['location']; ?></td>

<td>

<span class="badge bg-warning">

<?php echo $row['status']; ?>

</span>

</td>

<td><?php echo $row['reported_at']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>