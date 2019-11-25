<?php
/*Jihyun Song*/
include ('navigationbar.html');
include 'db_connection.php';
  if($mysqli->connect_error) {
    die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');
  }
  $mysqli->set_charset('utf8');
  $b_id = $_GET['b_id'];

  $sql = 'UPDATE boarddb set b_views = b_views + 1 where b_id = ' . $b_id;
  $result = $mysqli->query($sql); 

  $sql = 'select b_title, b_content, b_date, b_views, u_id, b_id from boarddb where b_id = ' . $b_id;
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
            $datetime = explode(' ', $row['b_date']);
            $date = $datetime[0];
            $time = $datetime[1];
            if($date == Date('Y-m-d'))
              $row['b_date'] = $time;
            else
              $row['b_date'] = $date;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Board</title>
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
	<h2><?php echo $row['b_title'];?></h2>
	<div id="user_info">
		<?php echo $row['b_date'];?> viwes:<?php echo $row['b_views'];?>
		<div id="bo_line"></div>
	</div>
	<div id="bo_content">
		<?php echo $row['b_content'];?>
	</div>
	<button type="back" class="btn btn-default" style="float: left;" onclick="location.href='board.php'">back</button>
    	<button type="edit" class="btn btn-default" onclick="location.href='editPage.php?b_id=<?php echo $row['b_id']?>'">edit</button>
	<button type="delete" class="btn btn-default" style="float: right;" onclick="location.href='delete.php?b_id=<?php echo $row['b_id']?>'">delete</button>
	</article>
</div>
</div>
</body>
</html>