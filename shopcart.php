<?php
session_start();

$myfile = fopen("cart.txt", "r") or die("Unable to open file!");
$cartItems = [];
while (!feof($myfile)) {
    $line = fgets($myfile);
    if (!empty($line)) {
        $cartItems[] = json_decode($line, true);
    }
}
fclose($myfile);

$aggregatedItems = [];
foreach ($cartItems as $item) {
    $name = $item['name'];
    $price = $item['price'];
    $image = $item['image'];

    if (isset($aggregatedItems[$name])) {

        $aggregatedItems[$name]['quantity'] += $item['quantity'];
    } else {

        $aggregatedItems[$name] = [
            'name' => $name,
            'price' => $price,
            'image' => $image,
            'quantity' => $item['quantity']
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['deleteSelected'])) {

        $selectedItems = $_POST['selectedItems'] ?? [];

        $updatedCartItems = [];

        foreach ($cartItems as $item) {
            if (!in_array($item['name'], $selectedItems)) {
                $updatedCartItems[] = $item;
            }
        }

        $myfile = fopen("cart.txt", "w") or die("Unable to open file!");
        foreach ($updatedCartItems as $item) {
            fwrite($myfile, json_encode($item) . "\n");
        }
        fclose($myfile);

        header("Location: shopcart.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <a href="index.php" class="logo"><h1>ORMAN</h1></a>
    <nav>
        <ul class="nav_links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about us.php">About Us</a></li>
            <li class="menu">
                <a href="activities.php">
                    <span class="activities">Activities of Orman </span>  
                </a> 
                <ul class="submenu">
                    
                </ul>
            </li>
            <li><a href="Board Members.php">Board Members</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="shopcart.php">Cart</a></li>
        </ul>
    </nav>
    <div class="header-buttons">
        <a href="donation.php"><button>Donate</button></a>
        <?php
        if (isset($_SESSION['Username'])) {
            echo "<a href='Logout.php'><button>Logout</button></a>";
        } else {
            echo "<a href='Signin.php'><button>Sign in</button></a>";
        }
        ?>
    </div>
    
</header>

<style>
    img {
        width: 100px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    form {
        display: inline-block;
    }
</style>

<form method="post" action="" style="display:flex;">
    <table>
        <tr>
            <th>Select</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Actions</th>
        </tr>

        <?php
        $total = 0;
        foreach ($aggregatedItems as $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
            ?>
            <tr>
                <td>
                    <input type="checkbox" name="selectedItems[]" value="<?php echo $item['name']; ?>">
                </td>
                <td><img src="<?php echo $item['image']; ?>" alt="#"></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td>
                    <?php echo $item['quantity']; ?><br>
                    <form method="post" action="removeFromCart.php">
                        <input type="hidden" name="remove" value="<?php echo $item['name']; ?>">
                        <button type="submit">-</button>
                    </form>
                    <form method="post" action="addbuttonfromcart.php">
                        <input type="hidden" name="product" value="<?php echo $item['name']; ?>">
                        <button type="submit" name="add">+</button>
                    </form>
                </td>
                <td><?php echo $subtotal; ?></td>
                <td>
                    <form method="post" action="removeproductFromCart.php">
                        <input type="hidden" name="remove" value="<?php echo $item['name']; ?>">
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="7" style="text-align: right;">
                <button id="submit" type="submit" name="deleteSelected">Delete Selected Items</button>
            </td>
        </tr>
        <tr>
            <td colspan="7">
                <h1 style="text-align: center;">Total: <?php echo $total; ?></h1>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
