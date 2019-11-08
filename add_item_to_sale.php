<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mite_olx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$n1 = (rand(10,5000));
$n2 = date("Ymd");
$n4 = time();
$id = $n1 . $n2 . $n4;
$i_name = $_POST["item_name"];
$pic = addslashes(file_get_contents($_FILES["pic"]["tmp_name"]));
$price = $_POST["price"];
$description = $_POST["description"];

$sql = "INSERT INTO item_to_sale VALUES ('$id' , '$i_name' , '$pic' , '$price' , '$description')";

if ($conn->query($sql) === TRUE) 
{
    ?>
    <script>
        alert("Item Added Successfully!!");
        window.location = "http://localhost/mite_olx/add_item_to_sale.php" ;
    </script>
    <?php
} 
else 
{
    ?>
    <script>
        // alert("Failed to Add Item!!");
        // window.location = "http://localhost/mite_olx/add_item_to_sale.php" ;
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
    <script>
        $(document).ready(function(){
            $('submitbtn').click(function(){
                var image_name = $('#pic').val();
                if(image_name == '')
                {
                    alert("please Select a Image");
                    return false;
                }
                else
                {
                    var ext = $('#pic').val().split('.').pop().toLowerCase();
                    if(jQuery.inArray(ext , ['gif' , 'png' , 'jpg' , 'jpeg']) == -1)
                    {
                        alert("Invalid Image Type");
                    }
                    $('#pic').val('');
                    return false;
                }
            });
        });
    </script>
</head>

<body style="background-color: #475d62;">
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
                        <form role="Form" method="post" action="#" accept-charset="UTF-8">
                            <div class="form-group">
                                <label for="fname">Item - Name</label>
                                <input type="text" id="fname" class="form-control" name="item_name" placeholder="Enter Your Item Name">
                            </div>
                            <div class="form-group">
                                <label>Item Image</label>
                                <input type="file" name="pic" id="pic" accept="image/*">
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



