<?php

include(__DIR__ . '/../../citizen_auth.php');
include(__DIR__ . '/../../../database.php');

$message="";

if(isset($_POST['submit'])){

$user_id=$_SESSION['id'];

$type=$_POST['incident_type'];

$location=$_POST['location'];

$description=$_POST['description'];

$image="";

if($_FILES['image']['name']!=""){

$image=time()."_".$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
"../assets/uploads/".$image
);

}

$sql="INSERT INTO incidents
(user_id,incident_type,location,description,image)
VALUES
('$user_id','$type','$location','$description','$image')";

if(mysqli_query($conn,$sql)){

$message="Incident Report Submitted Successfully";

}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Report Incident</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Report Disaster Incident</h2>

<div class="alert alert-success">

<?php echo $message; ?>

</div>

<form method="POST"
enctype="multipart/form-data">

<label>Incident Type</label>

<select
name="incident_type"
class="form-control mb-3">

<option>Flood</option>

<option>Fire</option>

<option>Landslide</option>

<option>Storm</option>

<option>Road Accident</option>

</select>

<label>Location</label>

<input
type="text"
name="location"
class="form-control mb-3"
required>

<label>Description</label>

<textarea
name="description"
class="form-control mb-3"
rows="5"
required></textarea>

<label>Upload Photo</label>

<input
type="file"
name="image"
class="form-control mb-3">

<button
class="btn btn-danger"
name="submit">

Submit Report

</button>

</form>

</div>

</body>
</html>