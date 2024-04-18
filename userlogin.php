<?php

if (session_status() === 1) {

    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $Password = $_POST['Password'];



    $users = file('Users.txt', FILE_IGNORE_NEW_LINES);
foreach ($users as $user) {
    $user = json_decode($user, true);
    if ($user && $user['Username'] == $username && base64_decode($user['Password']) == $Password) {
            $_SESSION['Username'] = $username;
            $_SESSION['Email'] = $user['Email'];
            echo "<script>alert('Logged in Successfully!')</script>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
            echo "<h1>Welcome back, $username!<h1>";
            exit;
        }
    }
    echo "<script>alert('Invalid username or password')</script>";
    echo "<meta http-equiv='refresh' content='2;url=login.html'>";
    echo "<h1>Loading...<h1>";
    exit;
}



?>