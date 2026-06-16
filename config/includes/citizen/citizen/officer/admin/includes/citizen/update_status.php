include('../includes/mail.php');

$getUser=mysqli_query($conn,

"SELECT users.email
FROM incidents
JOIN users
ON incidents.user_id=users.id
WHERE incidents.id='$id'"

);

$user=mysqli_fetch_assoc($getUser);

sendEmail(

$user['email'],

'Incident Status Updated',

'Your incident status has changed to: '
.$status

);