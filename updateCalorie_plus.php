<?php
/*Soyeon Park*/
session_start();
$id=$_SESSION['userid'];
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $u_id = $_SESSION['userid'];
  $d_id = $_GET['d_id'];
  $d_cal= $_GET['d_cal'];
  $date=date('Y/m/d');

/*이부분 transaction Jihyun Song*/
try{
  $mysqli->autocommit(FALSE);
  $transactionres=$mysqli->query("INSERT INTO usercaldb(u_num, u_id, u_category, u_cal) VALUES (NULL, '$u_id', 1, '$d_cal')");
  if(!$transactionres){
    $transactionres->free();
    throw new Exception($mysqli->error);
  }

  $sqlone="SELECT u_weight from userinfodb where u_id='".$id."' order by u_date desc limit 1";
  $result = $mysqli->query($sqlone);
  $row = $result->fetch_assoc();
  $weight=$row['u_weight'];
  $transactionres=$mysqli->query("INSERT INTO userinfodb(u_id, u_date, u_weight, u_calSum) VALUES ('$id', '$date', '$weight', '$d_cal') ON DUPLICATE KEY UPDATE u_calSum = u_calSum + '$d_cal'");
  if(!$transactionres){
    $transactionres->free();
    throw new Exception($mysqli->error);
  }

  $mysqli->commit();
  $mysqli->autocommit(TRUE);

  echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./recipeDetail.php?d_id=' . $d_id.'');
}catch(Exception $e){
  $mysqli->rollback();
  $mysqli->autocommit(TRUE);
  echo "<center><h2>Update Calorie has failed!</h2></center><br>";
}
?>
