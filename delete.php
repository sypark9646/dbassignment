<?php
session_start();
if(!isset($_SESSION['userid']))//세션이 존재하지 않는 경우
{
    header('Location: ./loginPage.html');
} 
$id=$_GET['b_id'];

include 'db_connection.php';

$sql='delete from boarddb where b_id = '.$id;
$res = mysqli_query($mysqli,$sql);
if ($res) {
	echo "<center><h2>Deleting is completed!</h2></center><br>";
	header('Location: ./board.php');
}
else {
	echo "<center><h2>Deleting is failed!</h2></center><br>";
}

?>