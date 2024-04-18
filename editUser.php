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

input{
  padding: 10px;
    font-size: 16px;
    border-radius: 15px;
    width: 100%;
    margin-bottom: 20px;
    outline: none;
    background-color: white;
    color: black;
}

button{
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

  $oldUsername = $_POST['oldusername'];
  $newUsername = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($newUsername) || empty($email) || empty($password)) {
    $error = 'Please fill out all fields.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email address.';
  } else {

    $file = fopen('Users.txt', 'r+');
    if (flock($file, LOCK_EX)) {

      $newData = array('Username' => $newUsername, 'Email' => $email, 'Password' => $password);
      $newLine = json_encode($newData) . "\n";

      $output = '';
      while (($line = fgets($file)) !== false) {
        $oldData = json_decode($line, true);
        if ($oldData && $oldData['Username'] === $oldUsername) {
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

if (isset($error)) {
  echo '<p style="color: red;">' . $error . '</p>';
}
?>

<h1>Edit User</h1>

<form method="post">
  <label>Old Username:</label>
  <input type="text" name="oldusername" value="<?php echo $data['Username']; ?>" readonly>
  <br>
  <label>New Username:</label>
  <input type="text" name="username" value="<?php echo $data['Username'];?>" required>
<br>
<label>Email:</label>
<input type="email" name="email" value="<?php echo $data['Email']; ?>" required>
<br>
<input type="hidden" name="password" value="<?php echo $data['Password']; ?>">
<br>
<button type="submit">Save Changes</button>

</form> 
