<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <?php
        $activities = array(
            "Ending hunger and Poverty" => "Ending Hunger and Poverty.php",
            "Sustainable Cities and Communities, Clean Water and Sanitation" => "Sustainable Cities and Communities.php",
            "Good Health and Well-Being" => "Good Health and Well-Being.php",
            "Well Education" => "Well Education.php",
            "Orphans" => "Orphans.php",
            "Contribute To The Good" => "Contribute To The Good.php",
            "Decent Work and Economic Growth" => "Decent Work and Economic Growth.php",
            "Climate Action" => "Climate Action.php"
        );
    ?>
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
                    <?php foreach ($activities as $activity => $link): ?>
                        <li><a href="<?php echo $link ?>"><?php echo $activity ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="Board Members.php">Board Members</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="shopcart.php">cart</a></li>

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
        width: 300px;
    }

    .shopcontainer {
        display: flex;
        flex-wrap: wrap;
    }

    .shopdiv {
        width: 33%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .shopheading {
        margin: 20px;
    }
</style>

<div class="shopcontainer">
    <?php
    $myfile = fopen("Products.txt", "r") or die("Unable to open file!");

    $content = fread($myfile, filesize("Products.txt"));
    
    $products = json_decode($content, true);

    foreach ($products as $product) {
        ?>

        <div class="shopdiv">
            <img src="<?php echo $product['image']; ?>" alt="#" />
            <h3 class="shopheading"><?php echo $product['name']; ?><br> Price: <?php echo $product['price']; ?></h3>
            <form method="post" action="addToCart.php">
                <input type="hidden" name="product" value="<?php echo $product['name']; ?>">
                <button type="submit" name="add">Add to Cart</button>
            </form>
        </div>

        <?php
    }

    fclose($myfile);
    ?>
</div>

</body>
</html>
