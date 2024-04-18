<?php


function head($title)
{                  


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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content=<?php "This is the". $title ."page" ?>>
    <meta name="keywords" content="orphans, orphanage, adopt, foster, donate, <?php $title ?>">
    
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title><?php echo $title ?></title>
</head>
<?php
include 'userlogin.php';
?>

<body>

    <header>
    
        <a href="index.php" class="logo"><h1>ORMAN</h1></a>
        
        <nav>
        <ul class="nav_links">
            <li><a href="index.php" >Home</a></li>
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
        
        <div class="header-bu.ttons">
            <a href="donation.php"><button>Donate</button></a>
            <?php
            
            if (isset($_SESSION['Username'])) {
                echo "<a href='Logout.php'><button>Logout</button></a>";
            }
            
            else {
                echo "<a href='Signin.php'><button>Sign in</button></a>";
            }
            ?>
        </div>
        
    </header>    
<?php
}

function readLinesToTable($filename) {

    echo '<table border = 1>';
  
    echo '<thead>
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Reset Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>';
  
    $file = fopen($filename, 'r');
  
    if ($file) {

      while (($line = fgets($file)) !== false) {

        $data = json_decode($line, true);
  
        $user['Password'] = base64_decode($data['Password']);
  
        if ($data) {

          echo '<tr>';

          echo '<td>' . $data['Username'] . '</td>';

          echo '<td>' . $data['Email'] . '</td>';

          echo '<td><a href="resetpassword.php?username=' . urlencode($data['Username']) . '">' . urlencode($user['Password']) . '</a></td>';
  
          echo '<td><a href="editUser.php?username=' . urlencode($data['Username']) . '"><img src="images/edit2.png"></a></td>';

          echo '<td><a href="deleteUser.php?username=' . urlencode($data['Username']) . '"><img src="images/trash.png"></a></td>';
  
          echo '</tr>';
        }
      }
      fclose($file);
    }
    echo '</table>';
  }
  


function acthead($title)
{


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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content=<?php "This is the". $title ."page" ?>>
    <meta name="keywords" content="orphans, orphanage, adopt, foster, donate, <?php $title ?>">
    <link rel="stylesheet" href="activities.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title><?php echo $title ?></title>
</head>
<?php
include 'userlogin.php';
?>
<body>
    <header>
        <a href="index.php" class="logo"><h1>ORMAN</h1></a>
        <nav>
        <ul class="nav_links">
            <li><a href="index.php" >Home</a></li>
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
            }
            
            else {
                echo "<a href='Signin.php'><button>Sign in</button></a>";
            }
            ?>
        </div>
    </header>    
<?php
}












function backhead($title)
{



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title><?php echo $title ?></title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    

    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
  </head>    
<?php
}

















function foot()
{
?>

<footer>
    <div class="column1">
    <h3>Contact Us</h3>
    <a class="phone" href="tel:19455"><p>Hotline: 19455</p></a>
    <a class="phone" href="mailto:ormancharity@gmail.com"><p>Email: ormancharity@gmail.com</p></a>
    
    <p>
    
    </p>
    </div>
    <div class="column2">
    <h3>Leave a message</h3>
    <form name="message" action="confirmation link.php" onsubmit= "return messageForm();" >
    <input type="text"  name="firstName"   placeholder="First Name"    id="firstName">
    <input type="text"  name="lastName"    placeholder="Last Name"     id="lastName">
    <input type="tel"   name="phoneNumber" placeholder="Phone Number"  id="phoneNumber">
    <input type="email" name="emailAdress" placeholder="Email Address" id="emailAdress">
    <input type="text"  name="theMessage"  placeholder="Message"       id="sendMessage">
<br><button type="submit"> Send </button>
</form>
    </div>
    <div class="column3">
        <h3>Social Media</h3>
        <a href="https://www.facebook.com" target="_blank"><img class="socialmedia" src="images/facebook.png" width="32px" alt="facebook"></a>
        <a href="https://www.instagram.com" target="_blank"><img class="socialmedia" src="images/instagram.png" width="32px" alt="instagram"></a>
        <a href="https://www.tiktok.com" target="_blank"><img class="socialmedia" src="images/tiktok.png" width="32px" alt="tiktok"></a>
        <a href="https://www.youtube.com" target="_blank"><img class="socialmedia" src="images/youtube.png" width="32px" alt="youtube"></a>
        <a href="https://www.twitter.com" target="_blank"><img class="socialmedia" src="images/twitter.png" width="32px" alt="twitter"></a>
        <a href="https://www.linkedin.com" target="_blank"><img class="socialmedia" src="images/linkedin.png" width="32px" alt="linkedin"></a>
    </div>
    
    </footer>
</body>    
<script src="script.js"></script>
</html>
<?php
}
?>