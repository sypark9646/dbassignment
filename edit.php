<?php
session_start();
if(!isset($_SESSION['userid']))//세션이 존재하지 않는 경우
{
    header('Location: ./loginPage.html');
} 

$title=$_POST['title'];
$content=$_POST['content'];
$id=$_GET['b_id'];

include 'db_connection.php';
$sql='update boarddb SET b_title = "'.$title.'", b_content = "'.$content.'" where b_id = '.$id;
$res = mysqli_query($mysqli,$sql);
if ($res) {
	echo "<center><h2>Editing is completed!</h2></center><br>";
	header('Location: ./board.php');
}
else {
	echo "<center><h2>Editing is failed!</h2></center><br>";
}

?>