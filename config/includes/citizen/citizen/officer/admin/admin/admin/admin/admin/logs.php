<?php

include('../includes/admin_auth.php');
include('../config/database.php');

$result=mysqli_query($conn,
"SELECT activity_logs.*, users.fullname
FROM activity_logs
JOIN users ON activity_logs.user_id=users.id
ORDER BY log_date DESC");

?>

<div class="container mt-5">

<h2>Activity Logs</h2>

<table class="table table-bordered">

<tr>

<th>User</th>
<th>Activity</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['activity']; ?></td>

<td><?php echo $row['log_date']; ?></td>

</tr>

<?php } ?>

</table>

</div>