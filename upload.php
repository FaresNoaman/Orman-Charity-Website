<?php
include("Functions.php");
$fileName = "item-donations.txt";

$firstName = $_REQUEST["firstName"];
$lastName = $_REQUEST["lastName"];
$emailAdress = $_REQUEST["emailAdress"];
$phoneNumber = $_REQUEST["phoneNumber"];
$address = $_REQUEST["address"];
$fileNametxt = $_FILES["fileToUpload"]["name"];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  echo "<script>alert('Sorry, file already exists.')</script>";
  echo "<meta http-equiv='refresh' content='2;url=productsDonation.php'>";
  echo "<h1>Loading...<h1>";
  $uploadOk = 0;
  exit;
}

if ($_FILES["fileToUpload"]["size"] > 900000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
  echo "<meta http-equiv='refresh' content='2;url=productsDonation.php'>";
  echo "<h1>Loading...<h1>";
  $uploadOk = 0;
  exit;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
  echo "<meta http-equiv='refresh' content='2;url=productsDonation.php'>";
  echo "<h1>Loading...<h1>";
  $uploadOk = 0;
  exit;
}


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<h3>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<h3>";
    echo "<meta http-equiv='refresh' content='2;url=Success!.php'>";
  } else {
    echo "Sorry, there was an error uploading your file.";
    exit;
  }


  $newproduct = array(
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $emailAdress,
    "phoneNumber" => $phoneNumber,
    "address" => $address,
    "fileNametxt" => $fileNametxt
);
$file = fopen('item-donations.txt', 'a');
fwrite($file, json_encode($newproduct) . PHP_EOL);
fclose($file);

?>