<?php
  session_start();
  $id=$_SESSION['userid'];
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $d_id = $_GET['d_id'];

  $id=$_SESSION['userid'];
  /*transaction*/
try{
$mysqli->autocommit(FALSE); // i.e., start transaction
$transactionres=$mysqli->query( 'UPDATE dietdb set d_up = d_up + 1 where d_id = ' . $d_id);
if(!$transactionres){
$transactionres->free();
throw new Exception($mysqli->error);
}

$transactionres=$mysqli->query("INSERT INTO userfavoritesdb(u_id, u_favorite_id, u_category) VALUES ('$id', '$d_id', 0)");
if(!$transactionres){
$transactionres->free();
throw new Exception($mysqli->error);
}
/* commit insert */
$mysqli->commit();
$mysqli->autocommit(TRUE);/*end transaction*/

echo "<center><h2>Like is completed!</h2></center><br>";
header('Location: ./recipeDetail.php?d_id=' . $d_id.'');
}catch(Exception $e){
$mysqli->rollback();
$mysqli->autocommit(TRUE);
echo "<center><h2>Like is failed!</h2></center><br>";
}
?>

