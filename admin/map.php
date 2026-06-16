<?php

include('../includes/admin_auth.php');
include('../config/database.php');

?>

<!DOCTYPE html>
<html>

<head>

<title>Disaster Monitoring Map</title>

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

#map{

height:700px;

}

</style>

</head>

<body>

<div class="container-fluid">

<h2>Disaster Monitoring Map</h2>

<div id="map"></div>

</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

var map = L.map('map')
.setView([8.4606,-11.7799],8);

L.tileLayer(

'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

{

attribution:'© OpenStreetMap'

}

).addTo(map);

<?php

$result=mysqli_query($conn,
"SELECT * FROM incidents
WHERE latitude IS NOT NULL");

while($row=mysqli_fetch_assoc($result)){

?>

L.marker([
<?php echo $row['latitude']; ?>,
<?php echo $row['longitude']; ?>
])

.addTo(map)

.bindPopup(

"<b>Incident:</b>
<?php echo $row['incident_type']; ?>

<br>

Location:
<?php echo $row['location']; ?>

<br>

Status:
<?php echo $row['status']; ?>"

);

<?php

}

?>

</script>

</body>

</html>