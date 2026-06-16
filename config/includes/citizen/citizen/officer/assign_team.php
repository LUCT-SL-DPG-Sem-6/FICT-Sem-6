<?php

include('../includes/officer_auth.php');
include('../config/database.php');

$incident=$_GET['incident'];

if(isset($_POST['assign'])){

$team=$_POST['team'];

mysqli_query($conn,

"INSERT INTO incident_assignments
(incident_id,team_id)
VALUES
('$incident','$team')"

);

echo "Team Assigned Successfully";

}

$teams=mysqli_query($conn,
"SELECT * FROM response_teams");

?>

<form method="POST">

<h3>Assign Response Team</h3>

<select name="team">

<?php

while($row=mysqli_fetch_assoc($teams)){

?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['team_name']; ?>

</option>

<?php } ?>

</select>

<button name="assign">

Assign

</button>

</form>