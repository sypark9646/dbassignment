<?php
  session_start();
$id=$_SESSION['userid'];  
include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $e_id = $_GET['e_id'];
  

try{
$mysqli->autocommit(FALSE); // i.e., start transaction
$transactionres=$mysqli->query('UPDATE exercisedb set e_up = e_up + 1 where e_id = ' . $e_id);
if(!$transactionres){
$transactionres->free();
throw new Exception($mysqli->error);
}


$transactionres=$mysqli->query("INSERT INTO userfavoritesdb(u_id, u_favorite_id, u_category) VALUES ('$id', '$e_id', 1)");
if(!$transactionres){
$transactionres->free();
throw new Exception($mysqli->error);
}
/* commit insert */
$mysqli->commit();
$mysqli->autocommit(TRUE);/*end transaction*/

echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./exerciseDetail.php?e_id=' . $e_id.'');
}catch(Exception $e){
$mysqli->rollback();
$mysqli->autocommit(TRUE);
echo "<center><h2>Like is failed!</h2></center><br>";
}
?>

