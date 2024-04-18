
<?php
include_once "Functions.php";
head("Finance Donation");
?>


                    <div class="donation">
                        <h1 id="title1">Donation Form</h1><br>
                        <form name="donation" id="donationform" action="success.php" onsubmit="return donationForm();" method="post">
                        <?php
                        
                            if (!isset($_SESSION['Username'])){ ?>
                              
                                <input type="text"     name="firstName"       placeholder="Name"        id="firstName">
                                <input type="email"    name="emailAdress"     placeholder="Email Address"     id="emailAdress">
                           <?php }

                           else {?>
                            
                            <?php
                            $firstName = $_SESSION['Username'];
                            $emailAdress = $_SESSION['Email'];
                           } ?>
                                <input type="tel"      name="phoneNumber"     placeholder="Phone Number"      id="phoneNumber">
                                <input type="text"     name="card-number"     placeholder="Card Number"       id="card-number">
                                <input type="text"     name="cardName"        placeholder="Name on Card"      id="cardName">
                                <input type="text"     name="cardtype"        placeholder="Card Type"         id="CardType">
                                <input type="text"     name="donationamount"        placeholder="Donation amount"         id="donationamount">
                                <input type="date"     name="date"     placeholder="date"       id="date">

<?php
                                
$dataFile2 = fopen("years.txt", "r");
while (!feof($dataFile2)) {
    $Line2 = fgets($dataFile2);
    if(!empty($Line2)) {
        $data2[] = $Line2; 
    }
}
fclose($dataFile2);
echo "<select name='myComboBox2'>";
foreach ($data2 as $value2) {
    echo "<option value='$value2'>$value2</option>";
}
echo "</select>";

$datafile = fopen ("donate.txt" , "r");

while (!feof($datafile)){

    $Line = fgets($datafile);
    if (!empty($Line)){
        $data[] = $Line;
    }
}

fclose($datafile);

echo "<select name='combobox'>";
foreach($data as $value ){
    
    echo "<option>$value</option>";
}
echo "</select>";


?>



                <div class="clear"></div>

                


                <br><button type="submit">Donate</button>
            </form>
        </div>
                        


    <?php
foot()



?>
        