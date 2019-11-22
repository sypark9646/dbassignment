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
</head>  
<body>
<form action="updateUserInfo.php" method="post">
<center><h2> <span style="background-color:#f1f1f1; padding:20px;">
Today's weight <input type="number" step=0.01 name="weight" required>(kg) </span>
<button type="submit">UPDATE</button>
</h2></center><br>
</form>
</body>
</html>