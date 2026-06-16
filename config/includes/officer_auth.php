<?php

session_start();

if(!isset($_SESSION['id'])
|| $_SESSION['role'] != 'officer'){

header("Location: ../login.php");

exit();

}

?>