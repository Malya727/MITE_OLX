<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mite_olx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['email'];
    $n1 = (rand(10, 5000));
    $n2 = date("Ymd");
    $n4 = time();
    $id = $n1 . $n2 . $n4;
    $i_name = $_POST['item_name'];
    $na = $_FILES["image"]["name"];
    $ext = explode(".", $na);
    $_FILES["image"]["name"] = $id . "." . end($ext);
    $filepath = "uploads/" . $_FILES["image"]["name"];
    $price = $_POST['price'];
    move_uploaded_file($_FILES["image"]["tmp_name"], $filepath);
    $description = $_POST['description'];

    $sql = "INSERT INTO item_to_sale VALUES ('$user' , '$id' , '$i_name' , '$price' , '$filepath' , '$description')";

    if ($conn->query($sql) === TRUE) {
        ?>
        <script>
            alert("Item Added Successfully!!");
            window.location = "http://localhost/mite_olx/add_item_to_sale.php";
        </script>
    <?php
        } else {
            ?>
        <script>
            alert("Failed to Add Item!!");
            window.location = "http://localhost/mite_olx/add_item_to_sale.php";
        </script>
<?php
    }
    $conn->close();
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>Add item</title>
</head>

<body style="background-color: #475d62;">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="nav navbar-nav">
        <a class="navbar-brand" href="after_login.php">MITE OLX</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="add_item_to_sale.php">Add New Item</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li><a href="update_delete.php">Update / Delete</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo "Hello, " . $_SESSION['name']; ?></a></li>
        <li><a href="get_started.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>

  </nav>
    <div class="container">
        <br />
        <div style="text-align: center; color: white; text-shadow: 3px 3px black;">
            <h2>Add Item to Sale</h2>
        </div>
        <br />
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Please Fill Below Form</div>
                    <div class="panel-body">
                        <form role="Form" method="post" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fname">Item - Name</label>
                                <input type="text" id="fname" class="form-control" name="item_name" placeholder="Enter Your Item Name">
                            </div>
                            <div class="form-group">
                                <label>Item Image</label>
                                <input type="file" name="image" id="pic">
                                <div id="error_msg" style="color:red"></div>
                            </div>
                            <div class="form-group">
                                <label for="lname">Price</label>
                                <input type="text" id="lname" class="form-control" name="price" placeholder="Enter Price (0 - 9999)">
                            </div>
                            <div class="form-group">
                                <label for="emailaddr">Description</label>
                                <textarea class="form-control" id="message" name="description" placeholder="Item Description*" required=""></textarea>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>