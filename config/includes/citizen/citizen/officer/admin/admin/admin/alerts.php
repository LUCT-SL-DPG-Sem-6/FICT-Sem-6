<?php

include('../includes/admin_auth.php');
include('../config/database.php');

$result=mysqli_query($conn,
"SELECT * FROM alerts ORDER BY created_at DESC");

?>

<div class="container mt-5">

<h2>Manage Alerts</h2>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Title</th>
<th>Severity</th>
<th>Location</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['severity']; ?></td>

<td><?php echo $row['location']; ?></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>

</table>

</div>