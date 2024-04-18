<?php
include_once "Functions.php";
backhead("Donation table");
session_start();
if (isset($_SESSION['Role']) && $_SESSION['Role'] == "donations"){
    $monthTotal = array("01"=>0, "02"=>0,"03"=>0, "04"=>0,"05"=>0, "06"=>0, "07"=>0, "08"=>0, "09"=>0, "10"=>0, "11"=>0, "12"=>0);
    $yearTotal = array("2019"=>0, "2020"=>0, "2021"=>0, "2022"=>0, "2023"=>0);

    $myfile = fopen("donation_form.txt", "r");
    if ($myfile) {

      while (($line = fgets($myfile)) !== false) {

        $data = json_decode($line, true);
        if ($data){
          if ($_REQUEST["sort"] == 'month'){
            $date = $data["Date"];
            $month = substr($date,5, -3);
            $monthTotal[strval($month)] += intval($data["Donation Amount"]);
          }
          if ($_REQUEST["sort"] == 'year'){
            $date = $data["Date"];
            $year = substr($date,0, 4);
            $yearTotal[strval($year)] += intval($data["Donation Amount"]);
            
          }
        }
      }
    }
    fclose($myfile);
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
            
            <div id="title"><h1> Donation Table</h1></div>
            <div class="col1">
            <table id="table">
                <?php if ($_REQUEST["sort"] == "month"){?>
                <thead>
                    <tr class="donation-table">
                        <th>Month</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                    <tbody>
                    <tr class="donation-table">
                        <td>January</td>
                        <td><?php echo $monthTotal["01"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>February</td>
                        <td><?php echo $monthTotal["02"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>March</td>
                        <td><?php echo $monthTotal["03"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>April</td>
                        <td><?php echo $monthTotal["04"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>May</td>
                        <td><?php echo $monthTotal["05"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>June</td>
                        <td><?php echo $monthTotal["06"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>July</td>
                        <td><?php echo $monthTotal["07"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>August</td>
                        <td><?php echo $monthTotal["08"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>September</td>
                        <td><?php echo $monthTotal["09"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>October</td>
                        <td><?php echo $monthTotal["10"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>November</td>
                        <td><?php echo $monthTotal["11"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>December</td>
                        <td><?php echo $monthTotal["12"]; ?></td>
                    </tr>
                    </tbody>
                    <?php } ?>
                <?php if ($_REQUEST["sort"] == "year"){?>
                <thead>
                    <tr class="donation-table">
                        <th>Years</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                    <tbody>
                    <tr class="donation-table">
                        <td>2019</td>
                        <td><?php echo $yearTotal["2019"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>2020</td>
                        <td><?php echo $yearTotal["2020"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>2021</td>
                        <td><?php echo $yearTotal["2021"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>2022</td>
                        <td><?php echo $yearTotal["2022"]; ?></td>
                    </tr>
                    <tr class="donation-table">
                        <td>2023</td>
                        <td><?php echo $yearTotal["2023"]; ?></td>
                    </tr>
                    </tbody>
                    <?php } ?>
            </table>