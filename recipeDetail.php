<?php
  include 'db_connection.php';
  include('navigationbar.html');

  $mysqli->set_charset('utf8');
  $d_id = $_GET['d_id'];

  $sql = 'select d_id, d_name, d_cal, d_txt, d_up, d_uri from dietdb where d_id = ' . $d_id;
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Recipe</title>
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
	
	<h2><?php echo $row['d_name'];?></h2>
	<div id="user_info">
		like: <?php echo $row['d_up'];?>
		<div id="bo_line"></div>
	</div>

	<div> <img src="<?php echo $row['d_uri'];?>"/> </div>
	<div id="bo_content">
		<?php echo $row['d_txt'];?>
	</div>
	<button type="back" class="btn btn-default" style="float: left;" onclick="location.href='recipe.php'">back</button>
	<button type="plus_calorie" class="btn btn-default" style="float: right;" onclick="location.href='updateCalorie_plus.php?d_id=<?php echo $row['d_id']?>&d_cal=<?php echo $row['d_cal']?>'">eat</button>
	<button type="like" class="btn btn-default" style="float: right;" onclick="location.href='recipeLike.php?d_id=<?php echo $row['d_id']?>'">like</button>
	</article>
</div>
</div>
</body>
</html>