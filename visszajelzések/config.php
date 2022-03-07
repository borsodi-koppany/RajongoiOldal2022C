<?php

$server = "localhost";
$username = "id18565598_root";
$password = "wxr0)qkx&/u#N=U2";
$database = "id18565598_comment_system";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { //If Check Connection
    die("<script>alert('Connection Failed.')</script>");
}

?>