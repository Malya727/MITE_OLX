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
    $id = $_GET['id'];
    $name = $_POST['item_name'];
    $pic = $_GET['pic'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $query1 = "DELETE FROM item_to_sale where id = '$id'";
    $query2 = "INSERT INTO item_to_sale VALUES ('$user' , '$id' , '$name' , '$price' , '$pic' , '$description' )";
    if (($conn->query($query1) === TRUE) && ($conn->query($query2) === TRUE)) {
        ?>
        <script>
            alert("Item Updated Successfully!!");
            window.location = "http://localhost/mite_olx/after_login.php";
        </script>
    <?php
        } else {
            ?>
        <script>
            alert("Failed to Updated Item!!");
            window.location = "http://localhost/mite_olx/update_delete.php";
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
            <h2>Update Item Here</h2>
        </div>
        <?php


        $id = $_GET['id'];

        $query = "select * from item_to_sale where id = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        ?>
        <br />
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Please Fill Below Form</div>
                    <div class="panel-body">
                        <form role="Form" method="post" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fname">Item - Name</label>
                                <input type="text" id="fname" class="form-control" name="item_name" value="<?php echo $row['item_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="lname">Price</label>
                                <input type="text" id="lname" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="emailaddr">Description</label>
                                <textarea class="form-control" id="message" name="description"><?php echo $row['decription']; ?></textarea>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>