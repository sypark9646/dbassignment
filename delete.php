<?php
session_start();
if(!isset($_SESSION['userid']))//������ �������� �ʴ� ���
{
    header('Location: ./loginPage.html');
} 
$id=$_GET['b_id'];

$mysqli=mysqli_connect("localhost","root","","dbassignment");
if (mysqli_connect_error()) {
             printf("Connect failed: %s\n",mysqli_connect_error());
             exit();
}
else {
             $sql='delete from boarddb where b_id = '.$id;
             $res = mysqli_query($mysqli,$sql);
             if ($res) {
		echo "<center><h2>Deleting is completed!</h2></center><br>";
                         header('Location: ./board.php');
             }
	else {
		echo "<center><h2>Deleting is failed!</h2></center><br>";
	}
}
?>