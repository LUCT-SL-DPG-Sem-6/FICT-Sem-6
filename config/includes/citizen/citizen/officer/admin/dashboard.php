<?php

include('../includes/admin_auth.php');
include('../config/database.php');

$totalUsers=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM users"));

$totalCitizens=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM users WHERE role='citizen'"));

$totalOfficers=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM users WHERE role='officer'"));

$totalAlerts=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM alerts"));

$totalIncidents=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM incidents"));

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Administrator Dashboard</h2>

<div class="row">

<div class="col-md-3">
<div class="card bg-primary text-white">
<div class="card-body">
<h1><?php echo $totalUsers; ?></h1>
<p>Total Users</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white">
<div class="card-body">
<h1><?php echo $totalCitizens; ?></h1>
<p>Citizens</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-dark">
<div class="card-body">
<h1><?php echo $totalOfficers; ?></h1>
<p>Officers</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-danger text-white">
<div class="card-body">
<h1><?php echo $totalAlerts; ?></h1>
<p>Alerts</p>
</div>
</div>
</div>

</div>

<hr>

<a href="users.php" class="btn btn-primary">
Manage Users
</a>

<a href="alerts.php" class="btn btn-danger">
Manage Alerts
</a>

<a href="contacts.php" class="btn btn-success">
Emergency Contacts
</a>

<a href="logs.php" class="btn btn-dark">
Activity Logs
</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="chart"></canvas>

<script>

new Chart(document.getElementById('chart'),{

type:'bar',

data:{

labels:[
'Users',
'Incidents',
'Alerts'
],

datasets:[{

label:'System Statistics',

data:[
<?php echo $totalUsers; ?>,
<?php echo $totalIncidents; ?>,
<?php echo $totalAlerts; ?>
]

}]

}

});

</script>

</body>
</html>