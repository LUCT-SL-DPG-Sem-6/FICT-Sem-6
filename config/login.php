<?php

session_start();

include(__DIR__ . '/database.php');

$error="";

if(isset($_POST['login'])){

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

$query=mysqli_query($conn,
"SELECT * FROM users WHERE username='$username' OR email='$username'");

if(mysqli_num_rows($query)>0){

$user=mysqli_fetch_assoc($query);

if(password_verify($password,$user['password'])){

$_SESSION['id']=$user['id'];
$_SESSION['fullname']=$user['fullname'];
$_SESSION['role']=$user['role'];

if($user['role']=="admin"){
header("Location: admin/dashboard.php");
exit();
}

if($user['role']=="officer"){
header("Location: officer/dashboard.php");
exit();
}

if($user['role']=="citizen"){
header("Location: citizen/dashboard.php");
exit();
}

}else{

$error="Invalid Password";

}

}else{

$error="User Not Found";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card">

<div class="card-header bg-danger text-white">

<h3>Login</h3>

</div>

<div class="card-body">

<?php echo $error; ?>

<form method="POST">

<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
autofocus
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button
class="btn btn-danger w-100"
name="login">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>