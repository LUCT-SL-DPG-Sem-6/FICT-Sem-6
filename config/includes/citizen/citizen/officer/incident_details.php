<?php

include('../includes/officer_auth.php');
include('../config/database.php');

$id=$_GET['id'];

$result=mysqli_query($conn,
"SELECT * FROM incidents WHERE id='$id'");

$incident=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Incident Details</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Incident Details</h2>

<p><strong>Type:</strong>
<?php echo $incident['incident_type']; ?>
</p>

<p><strong>Location:</strong>
<?php echo $incident['location']; ?>
</p>

<p><strong>Description:</strong>
<?php echo $incident['description']; ?>
</p>

<p><strong>Status:</strong>
<?php echo $incident['status']; ?>
</p>

<?php if($incident['image']!=""){ ?>

<img
src="../assets/uploads/<?php echo $incident['image']; ?>"
width="400"
class="img-fluid">

<?php } ?>

<br><br>

<a href="update_status.php?id=<?php echo $incident['id']; ?>"
class="btn btn-success">

Update Status

</a>

</div>

</body>
</html>