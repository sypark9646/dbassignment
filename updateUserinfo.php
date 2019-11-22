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

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
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

<?php
session_start();
$id=$_SESSION['userid'];
include 'db_connection.php';
$weight=$_POST['weight'];
$date=date('Y/m/d-H:i'); 
$signup2=mysqli_query($mysqli,"INSERT INTO userinfodb(u_id, u_date, u_weight, u_calSum) VALUES ('$id', '$date', '$weight', 0)");
if($signup2){
	echo "<center><h2>업데이트 성공!</h2></center><br>";
}
?>

<center><button onclick="location.href='./mypage.php'">GO to mypage</button></center>
?>
</html>