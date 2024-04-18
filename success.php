


<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        h2 {
            font-size: 48px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        p {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .message-container {
            margin-bottom: 30px;
        }

        .back-link {
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid #fff;
            transition: color 0.3s, border-bottom-color 0.3s;
        }

        .back-link:hover {
            color: #0088a9;
            border-bottom-color:#0088a9;
        }
    </style>
</head>
<body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = array(
        'First Name' => $_POST['firstName'],
        'Email Address' => $_POST['emailAdress'],
        'Phone Number' => $_POST['phoneNumber'],
        'Donation Amount' => $_POST['donationamount'],
        'Date' => $_POST['date']
    );

   
    $jsonData = json_encode($formData);

    $file = fopen("donation_form.txt", "a"); 
    fwrite($file, $jsonData . "\n");
    fclose($file);
}

?>
    <script>

        setTimeout(function() {
            window.location.href = "financeDonation.php";
        }, 5000);
    </script>

    <div class="message-container">
        <h2>Form Submitted Successfully!</h2>
        <p>Thank you for your submission.</p>
       <p>We will be in touch with you shortly.</p>
    </div>
    <p>You will be redirected back to the form page in 5 seconds.</p>
    <p><a href="financeDonation.php" class="back-link">Go back to the form</a></p>
</body>
</html>


    