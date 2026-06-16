<?php

session_start();

if(!isset($_SESSION['id'])
|| $_SESSION['role'] != 'citizen'){

header("Location: ../login.php");

exit();

}

?>