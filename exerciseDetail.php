<?php
  include 'db_connection.php';
  include('navigationbar.html');

  $mysqli->set_charset('utf8');
  $e_id = $_GET['e_id'];

  $sql = 'select e_id, e_name, e_cal, e_txt, e_up from exercisedb where e_id = ' . $e_id;
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Exercise</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./js/jquery-2.1.3.min.js"></script>
</head>
<body>
<div align=center>
<div id="board_read">
	<article class="boardArticle">
	<h2><?php echo $row['e_name'];?></h2>
	<div id="user_info">
		like: <?php echo $row['e_up'];?>
		<div id="bo_line"></div>
	</div>
	<div id="bo_content">
		<?php echo $row['e_txt'];?>
	</div>
	<button type="back" class="btn btn-default" style="float: left;" onclick="location.href='exercise.php'">back</button>
	<button type="minus_calorie" class="btn btn-default" style="float: right;" onclick="location.href='updateCalorie_minus.php?e_id=<?php echo $row['e_id']?>&e_cal=<?php echo $row['e_cal']?>'">exercise</button>
	<button type="like" class="btn btn-default" style="float: right;" onclick="location.href='exerciseLike.php?e_id=<?php echo $row['e_id']?>'">like</button>
	</article>
</div>
</div>
</body>
</html>