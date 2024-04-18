<link rel="stylesheet" href="style.css">
<?php
session_start();

if (isset($_POST['add'])) {
    $product_name = $_POST['product'];

    $myfile = fopen("Products.txt", "r") or die("Unable to open file!");

    $content = fread($myfile, filesize("Products.txt"));

    $products = json_decode($content, true);

    fclose($myfile);

    $selected_product = null;

    foreach ($products as $product) {
        if ($product['name'] === $product_name) {
            $selected_product = $product;
            break;
        }
    }

    if ($selected_product) {
        $cart_item = array(
            'name' => $selected_product['name'],
            'price' => $selected_product['price'],
            'image' => $selected_product['image'],
            'quantity' => 1
        );

        $myfile = fopen("cart.txt", "a") or die("Unable to open file!");

        fwrite($myfile, json_encode($cart_item) . PHP_EOL);

        fclose($myfile);

        echo "<h1> Product added to cart successfully! </h1>";
    } else {
        echo "Product not found!";
    }
}
header('location:shopcart.php');

?>