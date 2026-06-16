<?php

include(__DIR__ . '/../../citizen_auth.php');
include(__DIR__ . '/../../../database.php');

$user_id=$_SESSION['id'];

$result=mysqli_query($conn,
"SELECT * FROM notifications
WHERE user_id='$user_id'
ORDER BY created_at DESC");

?>

<h2>Notifications</h2>

<?php

while($note=mysqli_fetch_assoc($result)){

echo "

<div class='alert alert-info'>

<h5>".$note['title']."</h5>

<p>".$note['message']."</p>

</div>

";

}

?>