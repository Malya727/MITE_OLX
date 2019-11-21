<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>Display Details</title>
    <style>
        .bg {
            background: url(Images/display_bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body class="bg">
    <h3 style="text-align:center ; color:red ; text-shadow:2px 2px black ;">To Buy this Product Please Contact:</h3>
    <div class="container">
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6" style="background-color:white">
<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mite_olx";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = $_GET['username'];
        $sql = "SELECT * from user where email = '$id' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <center><h2 >Name : <?php echo $row['name'];?></h2><br/>
                <h2 >Phone Number : <?php echo $row['phone_number'];?></h2><br/>
                <h2 >Branch : <?php echo $row['branch'];?></h2><br/>
                <h2 >Email : <?php echo $row['email'];?></h2><br/>
                <a href="after_login.php"><button class="btn btn-primary">Return Back</button></a></br/>
        </center>

        <?php
        $conn->close();

?>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>