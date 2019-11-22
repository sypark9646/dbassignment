<?php
session_start();
if(!isset($_SESSION['userid']))//세션이 존재하지 않는 경우
{
    header('Location: ./loginPage.html');
} 

$title=$_POST['title'];
$content=$_POST['content'];
$id=$_SESSION["userid"];
$date=date('Y/m/d-H:i'); 

$mysqli=mysqli_connect("localhost","root","","dbassignment");
if (mysqli_connect_error()) {
             printf("Connect failed: %s\n",mysqli_connect_error());
             exit();
}
else {
             $sql = "INSERT INTO boarddb(b_id, b_title, b_content, b_date, b_views, u_id) VALUES(NULL, '$title', '$content', '$date', 0, '$id')";
             $res = mysqli_query($mysqli,$sql);
             if ($res) {
		echo "<center><h2>Posting is completed!</h2></center><br>";
                         header('Location: ./board.php');
             }
	else {
		echo "<center><h2>Posting is failed!</h2></center><br>";
	}
}
?>