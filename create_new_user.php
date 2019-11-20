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
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST["name"];
$pnumber = $_POST["pnumber"];
$branch = $_POST["branch"];
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "INSERT INTO user VALUES ('$name' , '$pnumber' , '$branch' , '$email' , '$password')";
if ($conn->query($sql) === TRUE) 
{
    ?>
    <script>
        alert("Account Created Successfully!!");
        window.location = "http://localhost/mite_olx/get_started.php" ;
    </script>
    <?php
} 
else 
{
    ?><script>
        alert("Account Creation Failed!!");
        window.location = "http://localhost/mite_olx/create_new_user.php" ;
    </script><?php
}
}

$conn->close();
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
    <title>Create Account Here</title>
    <script type="text/javascript">
    function validateForm()
    { console.log("working...")
        var password = document.getElementById('password').value;
        var re_password = document.getElementById('repassword').value;
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var pnumber = document.getElementById('pnumber').value;
        if (password != re_password)
        {
            document.getElementById('password_missmatch').innerHTML="Password mismatch!"
            return false;
        }
        else
        {
            return true;
        }
    }
    </script>
</head>

<body style="background-color: #475d62;">
    <div class="container">
        <br />
        <div style="text-align: center; color: white; text-shadow: 3px 3px black;">
            <h2>Create Your Account Here</h2>
        </div>
        <br />
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Please Fill Below Form</div>
                    <div class="panel-body">
                        <form name="myform"  onsubmit="return validateForm();"role="Form" method="post" action="#"  accept-charset="UTF-8">
                            <div class="form-group">
                                <label for="fname">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="lname">Phone Number</label>
                                <input type="text" id="pnumber" class="form-control" name="pnumber"
                                    placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="gender">Your Branch</label>
                                <select id="gender" class="form-control" name="branch">
                                <option value="AE">--Select--</option>
                                    <option value="AE">Aeronotical Engineering</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="EC">Electronics and Engineering</option>
                                    <option value="CV">Civil Engineering</option>
                                    <option value="ISE">Information Science</option>
                                    <option value="ME">Mechanical Engineering</option>
                                    <option value="MT">Mectronics Engineering</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emailaddr">Email Address</label>
                                <input type="text" id="email" class="form-control" name="email"
                                    placeholder="Enter Email ID ">
                                    <span id="email" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="password">Re-Enter Password</label>
                                <input type="password" id="repassword" class="form-control" name="repassword"
                                    placeholder="Re-Enter Password">
                            </div>
                            <span id="password_missmatch" style="color:red"></span>
                            <span id="empty" style="color:red"></span>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg" id="submitbtn"
                                    name="submit">Create</button>
                            </div>
                            <div><center><a class="forgot" href="get_started.php">Already Have Account?<br/> Sign In</a></center></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>