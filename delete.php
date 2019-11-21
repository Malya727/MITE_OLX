<?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "mite_olx";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }

                $id = $_GET['id'];
                $sql = "DELETE from item_to_sale where id = '$id' ";

                if ($conn->query($sql) === TRUE) {
                ?>
                <script>
                    alert("Item Deleted Successfully!!");
                    window.location = "http://localhost/mite_olx/update_delete.php";
                </script>
                <?php
                } 
                else 
                {
                ?>
                <script>
                    alert("Failed to Delete Item!!");
                    window.location = "http://localhost/mite_olx/update_delete.php";
                </script>
                <?php
                }
                    $conn->close();

?>
