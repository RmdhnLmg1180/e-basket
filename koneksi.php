<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "e_basket";
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambaung dengan database.')</script>");
}
?>