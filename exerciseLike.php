<?php
  include 'db_connection.php';

  $mysqli->set_charset('utf8');
  $e_id = $_GET['e_id'];

  $sql = 'UPDATE exercisedb set e_up = e_up + 1 where e_id = ' . $e_id;
  $res = $mysqli->query($sql);
  if ($res) {
		echo "<center><h2>Like is completed!</h2></center><br>";
                         header('Location: ./exerciseDetail.php?e_id=' . $e_id.'');
             }
	else {
		echo "<center><h2>Like is failed!</h2></center><br>";
	}
?>