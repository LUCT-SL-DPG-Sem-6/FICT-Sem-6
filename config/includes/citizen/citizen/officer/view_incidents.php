<?php

include('../includes/officer_auth.php');
include('../config/database.php');

$result = mysqli_query($conn,
"SELECT incidents.*, users.fullname
FROM incidents
JOIN users ON incidents.user_id=users.id
ORDER BY reported_at DESC");

?>

<!DOCTYPE html>
<html>
<head>

<title>Incident Reports</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Incident Reports</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Citizen</th>
<th>Type</th>
<th>Location</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['incident_type']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="incident_details.php?id=<?php echo $row['id']; ?>"
class="btn btn-sm btn-primary">

View

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>