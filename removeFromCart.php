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
$removed = false;
foreach ($cartItems as $item) {
    if ($item['name'] === $productToRemove && !$removed) {
        if ($item['quantity'] > 1) {
            $item['quantity'] -= 1;
            $updatedCartItems[] = $item;
        }
        $removed = true;
    } else {
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
