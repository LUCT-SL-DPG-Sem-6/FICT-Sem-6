<!DOCTYPE html>
<html>

<head>
<img
src="../assets/images/logo.png"
width="80">
<title>Disaster Alert and Response System</title>

<link rel="stylesheet"
href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="assets/css/style.css">

<link rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script
src="https://unpkg.com/leaflet/dist/leaflet.js">
</script>

</head>

<body>
    <button
onclick="toggleDarkMode()"
class="btn btn-dark">

Dark Mode

</button>

<?php include('includes/navbar.php'); ?>

<section class="hero">

<div class="container text-center">

<h1>Stay Alert. Stay Safe.</h1>

<p class="lead">

Real-time disaster alerts and emergency response coordination for Sierra Leone.

</p>

<a href="register.php"
class="btn btn-danger btn-lg">

Get Started

</a>

</div>

</section>

<section class="container py-5">

<h2 class="section-title">
Disaster Statistics
</h2>

<div class="row">

<div class="col-md-3">

<div class="card stat-card text-center">

<div class="card-body">

<h1>125</h1>

<p>Flood Reports</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card stat-card text-center">

<div class="card-body">

<h1>67</h1>

<p>Fire Incidents</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card stat-card text-center">

<div class="card-body">

<h1>32</h1>

<p>Landslides</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card stat-card text-center">

<div class="card-body">

<h1>210</h1>

<p>Resolved Cases</p>

</div>

</div>

</div>

</div>

</section>

<section class="bg-light py-5">

<div class="container">

<h2 class="section-title">

Recent Emergency Alerts

</h2>

<div class="alert alert-danger">

<strong>Flood Warning:</strong>

Heavy rainfall expected in Freetown.

</div>

<div class="alert alert-warning">

<strong>Storm Alert:</strong>

Strong winds expected within 24 hours.

</div>

</div>

</section>

<section class="container py-5">

<h2 class="section-title">

Emergency Contacts

</h2>

<div class="row">

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Police</h5>

<p>019</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Fire Force</h5>

<p>999</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>NDMA</h5>

<p>117</p>

</div>

</div>

</div>

</div>

</div>

</section>

<footer class="footer text-center">

<div id="loader">

<div class="spinner-border text-danger">

</div>
<div class="row">

<div class="col-md-3">

<div class="card bg-primary text-white">

<div class="card-body">

<h2><?php echo $totalUsers; ?></h2>

<p>Total Users</p>

</div>

</div>

</div>

</div>
</div>
<p>

© 2026 Disaster Alert and Response System

</p>

<form method="GET">

<input
type="text"
name="district"
placeholder="Search District">

<button>

Search

</button>

</form>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>