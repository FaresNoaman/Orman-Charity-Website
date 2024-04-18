<?php
include_once "Functions.php";
backhead("Dashboard");
session_start();
if (isset($_SESSION['Role'])){
?>
<body>
    

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ORMAN</a>
    <a class="nav-link navbar-nav px-3" href="Logout.php">Sign out</a>
  </nav>

  <div class="container-fluid">
    <div class="row">
        <div class="col">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

          <ul class="nav flex-column">

            <li>
              <a class="nav-link active" href="#"> Dashboard </a>
            </li>

            <li>
              <a class="nav-link" href="Donation Table Page.php"> Donations </a>
            </li>

            <li >
              <a class="nav-link" href="users.php"> Users </a>
            </li>

          </ul>

        </div>
      </nav>
    </div>
   
    <div class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <img src="images/chart.png" width ="100%" alt="chart">
    </div>


    </div>
  </div>
  
    </body>
</html>
<?php
}
else{
  echo "<h1>Please login as admin</h1>";
}
?>