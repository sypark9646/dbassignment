<?php
session_start();
if(!isset($_SESSION['userid']))//������ �������� �ʴ� ���
{
    header('Location: ./loginPage.html');
} 

$title=$_POST['title'];
$content=$_POST['content'];
$id=$_SESSION["userid"];
$date=date('Y/m/d-H:i'); 

include 'db_connection.php';

$sql = "INSERT INTO boarddb(b_id, b_title, b_content, b_date, b_views, u_id) VALUES(NULL, '$title', '$content', '$date', 0, '$id')";
$res = mysqli_query($mysqli,$sql);
if ($res) {
	echo "<center><h2>Posting is completed!</h2></center><br>";
            header('Location: ./board.php');
}
else {
	echo "<center><h2>Posting is failed!</h2></center><br>";
}
?>