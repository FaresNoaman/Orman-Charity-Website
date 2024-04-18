<?php

$username = $_POST["username"];
$Email = $_POST["emailAdress"];
$Password = base64_encode($_POST['Password']);

$users = file('Users.txt', FILE_IGNORE_NEW_LINES);
foreach ($users as $user) {
    $user = json_decode($user, true);
    if ($user && $user['Username'] == $username) {
        echo "<script>alert('Sorry $username already exists.')</script>";
        echo "<meta http-equiv='refresh' content='2;url=signup.html'>";
        echo "<h1>Loading...<h1>";
        exit;
    }
}

$newuser = array(
    'Username' => $username,
    'Email' => $Email,
    'Password' => $Password
);
$fo = fopen('Users.txt', 'a');
fwrite($fo, json_encode($newuser) . PHP_EOL);
fclose($fo);
echo "<script>alert('The username $username was added successfully!')</script>";
echo "<meta http-equiv='refresh' content='2;url=index.php'>";
echo "<h1>Welcome, $username!<h1>";
exit;

?>
