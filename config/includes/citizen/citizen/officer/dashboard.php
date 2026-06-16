<?php

include('../includes/officer_auth.php');
include('../config/database.php');

$totalIncidents = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM incidents")
);

$pending = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM incidents WHERE status='Pending'")
);

$verified = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM incidents WHERE status='Verified'")
);

$resolved = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM incidents WHERE status='Resolved'")
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Officer Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Emergency Officer Dashboard</h2>

<div class="row">

<div class="col-md-3">
<div class="card text-center">
<div class="card-body">
<h1><?php echo $totalIncidents; ?></h1>
<p>Total Incidents</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-center bg-warning text-white">
<div class="card-body">
<h1><?php echo $pending; ?></h1>
<p>Pending</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-center bg-primary text-white">
<div class="card-body">
<h1><?php echo $verified; ?></h1>
<p>Verified</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card text-center bg-success text-white">
<div class="card-body">
<h1><?php echo $resolved; ?></h1>
<p>Resolved</p>
</div>
</div>
</div>

</div>

<hr>

<a href="view_incidents.php" class="btn btn-danger">
Manage Incidents
</a>

<a href="create_alert.php" class="btn btn-primary">
Create Alert
</a>

<a href="../logout.php" class="btn btn-secondary">
Logout
</a>

</div>

</body>
</html>