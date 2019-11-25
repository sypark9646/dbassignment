<?php
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $d_id = $_GET['d_id'];
  $id=$_SESSION['userid']
  /*transaction ÇÊ¿ä*/
  $sql = 'UPDATE dietdb set d_up = d_up + 1 where d_id = ' . $d_id;
  $res = $mysqli->query($sql);
  $signup2=mysqli_query($mysqli,"INSERT INTO userfavoritesdb(u_id, u_favorite_id, u_category) VALUES ('$id', '$d_id', 0) ON DUPLICATE KEY UPDATE u_category = u_category");
  if ($res) {
		echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./recipeDetail.php?d_id=' . $d_id.'');
             }
	else {
		echo "<center><h2>Like is failed!</h2></center><br>";
	}
?>
