<?php

$productToRemove = $_POST['remove'];

$myfile = fopen("cart.txt", "r") or die("Unable to open file!");
$cartItems = [];
while (!feof($myfile)) {
    $line = fgets($myfile);
    if (!empty($line)) {
        $cartItems[] = json_decode($line, true);
    }
}
fclose($myfile);

$updatedCartItems = [];
foreach ($cartItems as $item) {
    if ($item['name'] !== $productToRemove) {
        $updatedCartItems[] = $item;
    }
}

$myfile = fopen("cart.txt", "w") or die("Unable to open file!");
foreach ($updatedCartItems as $item) {
    fwrite($myfile, json_encode($item) . PHP_EOL);
}
fclose($myfile);

header("Location: shopcart.php");
exit();
?>
