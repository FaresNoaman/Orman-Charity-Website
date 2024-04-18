<?php
    include("Functions.php");
    head("Item Donations");
?>


    <div class=donation>
    <h1 id="title1">Add Product</h1><br>
        <form name="donation" id="donation" method="post" onsubmit="return donationForm() " action="upload.php" enctype="multipart/form-data">
            <input type="text"   id="firstName"       name="firstName"   placeholder="First Name" class="form-control"><br>
            <input type="text"   id="lastName"        name="lastName"   placeholder="Last Name" class="form-control"><br>
            <input type="email"  id="emailAdress"     name="emailAdress"   placeholder="Email" class="form-control"><br>
            <input type="text"   id="phoneNumber"     name="phoneNumber" placeholder="Phone Number" class="form-control"><br>
            <input type="text"   id="address"         name="address" placeholder="Address" class="form-control"><br>
            <input type="file"   id="fileToUpload"    name="fileToUpload" class="form-control"><br>
            <input type="submit" id="submitionbutton" name="submitionbutton" class="form-control" >
        </form> 
    </div>



<?php
    foot();
?>