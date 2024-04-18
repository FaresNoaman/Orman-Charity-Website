<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sign.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/logo.JPG">

    <title>Administration</title>

</head>
<body>
   <div class="box">
    <div class="container">
        <form name="admin" method="post" action="adminlogin.php" onsubmit="return signUp();" enctype="multipart/form-data">
            <div class="top">
                
                <header>Administration</header>
            </div>

            <div class="input-field">
                <input type="text" class="input" placeholder="Username" id="username" name="username">
                <i class='bx bx-user' ></i>
            </div>

            <div class="input-field">
                <input type="Password" class="input" placeholder="Password" id="Password" name="Password">
                <i class='bx bx-lock-alt'></i>
            </div>

            <label>
                <input type="checkbox" onclick="showHide()"> Show password
            </label>

            <div class="input-field">
                <button class="submit" type="submit">Sign in</button>
            </div>
        </form>
    </div>
</div>  
</body>
<script src="signin.js"></script>
</html>