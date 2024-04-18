<?php
if (isset($_GET['username'])) {
  $username = $_GET['username'];

  $filename = 'Users.txt';
  $file = fopen($filename, 'r+');

  if ($file) {

    flock($file, LOCK_EX);

    $output = '';
    while (($line = fgets($file)) !== false) {
      $data = json_decode($line, true);
      if ($data && $data['Username'] !== $username) {
        $output .= $line;
      }
    }

    fseek($file, 0);
    fwrite($file, $output);
    ftruncate($file, ftell($file));

    flock($file, LOCK_UN);
    fclose($file);
  }

  header('Location: Users.php');
  exit;
}
?>
