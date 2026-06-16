<?php

include(__DIR__ . '/../citizen_auth.php');
include(__DIR__ . '/../../database.php');

$user_id = $_SESSION['id'];

$total_reports = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM incidents WHERE user_id='$user_id'")
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Citizen Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>
Welcome,
<?php echo $_SESSION['fullname']; ?>
</h2>

<hr>

<div class="row">

<div class="col-md-4">

<div class="card text-center">

<div class="card-body">

<h1><?php echo $total_reports; ?></h1>

<p>My Reports</p>

</div>

</div>

</div>

</div>

<br>

<a href="report_incident.php" class="btn btn-danger">
Report Incident
</a>

<a href="my_reports.php" class="btn btn-primary">
My Reports
</a>

<a href="alerts.php" class="btn btn-warning">
View Alerts
</a>

<a href="../logout.php" class="btn btn-secondary">
Logout
</a>

</div>

</body>
</html>