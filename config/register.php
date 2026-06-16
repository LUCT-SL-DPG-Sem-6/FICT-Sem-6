<?php

include(__DIR__ . '/database.php');

$message="";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $role = $_POST['role'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email' OR username='$username'");

    if(mysqli_num_rows($check)>0){

        $message = "Email already exists";

    }else{

        mysqli_query($conn,
        "INSERT INTO users(fullname,username,email,phone,password,role)
        VALUES('$fullname','$username','$email','$phone','$password','$role')");

        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card">

<div class="card-header bg-primary text-white">
<h3>Create Account</h3>
</div>

<div class="card-body">

<?php echo $message; ?>

<form method="POST">

<input type="text"
class="form-control mb-3"
name="fullname"
placeholder="Full Name"
required>

<input type="text"
class="form-control mb-3"
name="username"
placeholder="Username"
required>

<input type="email"
class="form-control mb-3"
name="email"
placeholder="Email"
required>

<input type="text"
class="form-control mb-3"
name="phone"
placeholder="Phone Number"
required>

<input type="password"
class="form-control mb-3"
name="password"
placeholder="Password"
required>

<select name="role"
class="form-control mb-3">

<option value="citizen">Citizen</option>

<option value="officer">Emergency Officer</option>

</select>

<button
class="btn btn-primary w-100"
name="register">

Register

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>