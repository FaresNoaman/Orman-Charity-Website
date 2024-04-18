<?php

if (session_status() === 1) {

    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $Password = $_POST['Password'];



    $users = file('admins.txt', FILE_IGNORE_NEW_LINES);
foreach ($users as $user) {
    $user = json_decode($user, true);
    if ($user && $user['Email'] == $username && base64_decode($user['Password']) == $Password) {
            $_SESSION['Email'] = $username;
            $_SESSION['Role'] = $user['Role'];
            echo "<script>alert('Logged in Successfully!')</script>";
            echo "<meta http-equiv='refresh' content='2;url=dashboard.php'>";
            echo "<h1>Welcome back, $username!<h1>";
            exit;
        }
    }
    echo "<script>alert('Invalid username or password')</script>";
    echo "<meta http-equiv='refresh' content='2;url=admin.php'>";
    echo "<h1>Loading...<h1>";
    exit;
}



?>