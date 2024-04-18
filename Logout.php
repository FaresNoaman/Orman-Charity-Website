<?php
session_start();
session_unset();
session_destroy();

echo "<meta http-equiv='refresh' content='2;url=index.php'>";
echo "<h1>Logged out Successfully<h1>";
?>