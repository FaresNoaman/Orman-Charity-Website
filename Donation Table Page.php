<?php
include_once "Functions.php";
backhead("Donation table");
session_start();
if (isset($_SESSION['Role']) && $_SESSION['Role'] == "donations") {
    $products = array();
    $myfile = fopen("item-donations.txt", "r");
    while (!feof($myfile)) {
        $line = fgets($myfile);
        if ($line != "") {
            $product = json_decode(trim($line), true);
            $products[] = $product;
        }
    }
?>
<body>
    

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ORMAN</a>
    <a class="nav-link navbar-nav px-3" href="index.php">Sign out</a>
  </nav>

  <div class="container-fluid">
    <div class="row">
        <div class="col">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">

            <li>
              <a class="nav-link" href="dashboard.php"> Dashboard </a>
            </li>

            <li>
              <a class="nav-link active" href="#"> Donations </a>
            </li>

            <li >
              <a class="nav-link" href="users.php"> Users </a>
            </li>

          </ul>

        </div>
      </nav>
    </div>
   
      <div class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      
        

        <div class="container">
		
            <div id="title">
                <h1> Donation Table</h1>
            </div>

            <div class="col1">
            <table id="table">
                <thead>
			<tr class="donation-table">
				<th>Name</th>
        <th>Email</th>
				<th>Product</th>
			</tr>
		</thead>
		<tbody>
    <?php foreach ($products as $product): ?>
        <tr class="donation-table">
            <td><?php echo $product["firstName"] . " " . $product["lastName"]; ?></td>
            <td><?php echo $product["email"]; ?></td>
            <td class="donation-table-image"><img src="uploads/<?php echo isset($product["fileNametxt"]) ? $product["fileNametxt"] : ''; ?>"></td>
        </tr>
    <?php endforeach; ?>
</tbody>
	</table>

          </div>
        </div>
      </div>
    </div>
  </div>
    
    </body>
</html>
<?php
}
else if (!isset($_SESSION['Role'])){
  echo '<script>
  setTimeout(function() {
      window.location.href = "admin.php";
  }, 3000);
</script>';
  echo "<h1>Please login as admin</h1>";
}

else{
  echo '<script>
  setTimeout(function() {
      window.location.href = "dashboard.php";
  }, 3000);
</script>';
  echo "<h1>You don't have access to this page</h1>";
}
?>