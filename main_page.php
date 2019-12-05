<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a2d9fe4007.js" crossorigin="anonymous"></script>
  <title>Welcome User</title>
  <style>
    hr {
      position: relative;
      top: 20px;
      border: none;
      height: 2px;
      background: red;
      margin-bottom: 50px;
    }
  </style>
</head>

<body style="background-color:skyblue">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="nav navbar-nav">
        <a class="navbar-brand" href="main_page.php">MITE OLX</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo "Hello, Guest"; ?></a></li>

        <li><a href="get_started.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>

  </nav>
  <div class="container" style="background-color:white">

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mite_olx";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    ?>
    <div class="container" style="width: 65%">
      <h2 style="text-align:center">OLX Cart</h2>
      <hr /><br />
      <?php
      $query = "SELECT * FROM item_to_sale ORDER BY item_name";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {

          $count += 1;
          ?>

          <div class="row" style="background-color:thistle">
            <div class="col-md-6">
              <div class="product">
                <img src="<?php echo $row["pic"]; ?>" class="img-responsive">
              </div>
            </div>

            <div class="col-md-6">
              <div class="product">
                <h5 style="color:black">Item Name : <?php echo $row["item_name"]; ?></h5>
                <h5 style="color:black">Description : <?php echo $row["decription"]; ?></h5>
                <h5 class="text-danger">Price : <?php echo $row["price"]; ?></h5>
                <a href="get_started.php"> <button class="btn btn-primary"> View Seller Details</button></a>
              </div>
            </div>

          </div>

        <?php
            echo "<hr/><br/><br/>";
          }
        } else {

          ?><center><i class="fas fa-poop fa fa-9x"></i><br /> Oops! No Data Found<br /></center><?php
                                                                                                }
                                                                                                ?>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>

</html>