<?php
session_start();
$id=$_SESSION['userid'];
include 'db_connection.php';
include('navigationbar.html');
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
button {
            background-color: #1B823F;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 150px;
        }

            button:hover {
                opacity: 0.8;
            }

        .container {
            padding: 50px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>  
<body style="background-color:#f1f1f1;>>
<form action="updateUserInfo.php" method="post">
<center><h2>
Today's weight <input type="number" step=0.01 name="weight" required>(kg)
<button type="submit">UPDATE</button>
</h2></center><br>
</form>
<center>
<button style='font-size:24px; background-color: #333; padding=50px;'>SHOW My Favorite Recipe!!!!<i class='fas fa-pizza-slice'></i></button>
<button style='font-size:24px; background-color: #333; padding=50px;'>SHOW My Favorite Exercise!<i class='fas fa-basketball-ball'></i></button>
</center>

</body>
</html>