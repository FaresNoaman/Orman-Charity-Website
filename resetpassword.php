<?php
echo '
<style>
* {
  font-weight: 300;
  color: white;
  background-color: black;
  font-family: "Montserrat", sans-serif;

}
h1{
  text-align: center;
  font-size: 45px;
}
form {
  margin: 20px auto;
  width: 400px;
  background-color: #24252a;
  padding: 50px;
  font-size: 25px;
  border-radius: 15px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
  background-color: 24252a;
}

input[type="text"],
input[type="password"] {
  padding: 10px;
    font-size: 16px;
    border-radius: 15px;
    width: 100%;
    margin-bottom: 20px;
    outline: none;
    background-color: white;
    color: black;
}

input[type="submit"] {
  padding: 9px 25px;
    background-color: rgba(0, 136, 169, 1);
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
    color: white;
    display:flex;
    margin-right:auto;
    margin-left:auto;
 
}

input[type="submit"]:hover {
  background-color: rgba(0, 136, 169, 0.8);
 
}
</style>
';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username'])) {

  $username = $_GET['username'];
  $file = fopen('Users.txt', 'r');
  if ($file) {
    while (($line = fgets($file)) !== false) {
      $data = json_decode($line, true);
      if ($data && $data['Username'] === $username) {
        break;
      }
    }
    fclose($file);
  }
  if (!$data) {

    header('Location: Users.php');
    exit;
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  if (empty($password)) {
    echo "<script>alert('Please enter the new password.')</script>";
    echo "<meta http-equiv='refresh' content='2;url=Users.php'>";
  } else {

    $file = fopen('Users.txt', 'r+');
    if (flock($file, LOCK_EX)) {

      $newData = array('Username' => $username, 'Email' => $email, 'Password' => base64_encode($password));
      $newLine = json_encode($newData) . "\n";

      $output = '';
      while (($line = fgets($file)) !== false) {
        $oldData = json_decode($line, true);
        if ($oldData && $oldData['Username'] === $username) {
          $output .= $newLine;
        } else {
          $output .= $line;
        }
      }

      fseek($file, 0);
      fwrite($file, $output);
      ftruncate($file, ftell($file));

      flock($file, LOCK_UN);
      fclose($file);

      header('Location: Users.php');
      exit;
    }
  }
}


?>

<h1>Reset Password</h1>

<form method="post">
  <input type="hidden" name="username" value="<?php echo $data['Username']; ?>">
  <input type="hidden" name="email" value="<?php echo $data['Email']; ?>">
  <br>
  <label>Password:</label>
  <input type="password" name="password" value="">
  <br>
  <input type="submit" name="submit" value="Save">
</form>
