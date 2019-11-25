<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        button {
            background-color: #1B823F;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
        }

       button:hover {
                opacity: 0.8;
      }
      </style>
</html>
<?php
/*Soyeon Park*/
session_start();
$id=$_SESSION['userid'];
include 'db_connection.php';
$weight=$_POST['weight'];
$date=date('Y/m/d');

$sql="INSERT INTO userinfodb(u_id, u_date, u_weight, u_calSum) VALUES ('$id', '$date', '$weight', 0) ON DUPLICATE KEY UPDATE u_weight = '$weight'";
$signup2=mysqli_query($mysqli,$sql);
if($signup2){
	echo "<center><h2>Update success!</h2></center><br>";
}
else{
	echo "<center><h2>Failed!</h2></center><br>";
}
?>
<center><button onclick="location.href='./mypage.php'">GO to mypage</button></center>:
