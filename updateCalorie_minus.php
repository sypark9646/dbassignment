<?php
session_start();
$id=$_SESSION['userid'];
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $e_id = $_GET['e_id'];
  $e_cal= $_GET['e_cal'];
  $date=date('Y/m/d');

/*이부분 transaction*/
  $sqlone="SELECT u_weight from userinfodb where u_id='".$id."' order by u_date desc limit 1";
  $result = $mysqli->query($sqlone);
  $row = $result->fetch_assoc();
  $weight=$row['u_weight'];
  $sql="INSERT INTO userinfodb(u_id, u_date, u_weight, u_calSum) VALUES ('$id', '$date', '$weight', '-$e_cal') ON DUPLICATE KEY UPDATE u_calSum = u_calSum - '$e_cal'";
  $signup2=mysqli_query($mysqli,$sql);
  
if ($signup2) {
		echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./exerciseDetail.php?e_id=' . $e_id.'');
             }
	else {
		echo "<center><h2>Update Calorie has failed!</h2></center><br>";
	}
?>