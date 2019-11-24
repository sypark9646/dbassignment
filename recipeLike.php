<?php
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $d_id = $_GET['d_id'];

  $sql = 'UPDATE dietdb set d_up = d_up + 1 where d_id = ' . $d_id;
  $res = $mysqli->query($sql);
  if ($res) {
		echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./recipeDetail.php?d_id=' . $d_id.'');
             }
	else {
		echo "<center><h2>Like is failed!</h2></center><br>";
	}
?>