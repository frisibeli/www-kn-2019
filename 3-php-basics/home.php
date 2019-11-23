<?php
session_start();

$user = $_SESSION['user'];

echo "Welcome home. Id: $user";

?>