<?php
session_start();
$id=$_SESSION['userid'];
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $u_id = $_SESSION['userid'];
  $e_id = $_GET['e_id'];
  $e_cal= $_GET['e_cal'];
  $date=date('Y/m/d');

/*이부분 transaction*/
try{
  $mysqli->autocommit(FALSE);
  $transactionres=$mysqli->query("INSERT INTO usercaldb(u_num, u_id, u_category, u_cal) VALUES (NULL, '$u_id', 0, '$e_cal')");
  if(!$transactionres){
    $transactionres->free();
    throw new Exception($mysqli->error);
  }
  
  $sqlone="SELECT u_weight from userinfodb where u_id='".$id."' order by u_date desc limit 1";
  $result = $mysqli->query($sqlone);
  $row = $result->fetch_assoc();
  $weight=$row['u_weight'];
  $transactionres=$mysqli->query("INSERT INTO userinfodb(u_id, u_date, u_weight, u_calSum) VALUES ('$id', '$date', '$weight', '-$e_cal') ON DUPLICATE KEY UPDATE u_calSum = u_calSum - '$e_cal'");
  if(!$transactionres){
    $transactionres->free();
    throw new Exception($mysqli->error);
  }

  $mysqli->commit();
  $mysqli->autocommit(TRUE);

  echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./exerciseDetail.php?e_id=' . $e_id.'');
}catch(Exception $e){
  $mysqli->rollback();
  $mysqli->autocommit(TRUE);
  echo "<center><h2>Update Calorie has failed!</h2></center><br>";
}
?>
