<?php
session_start();
$id=$_SESSION['userid'];
include('navigationbar.html');
include 'db_connection.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Board</title>
  <link rel="stylesheet" href="./css/normalize.css" />
  <link rel="stylesheet" href="./css/board.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div align=center>
<article class="boardArticle">
  <h2 align=center>Recipe</h2>
  <div id="boardList">
    <table>
      <thead>
        <tr>
          <th scope="col" class="no">num</th>
          <th scope="col" class="title">name</th>
          <th scope="col" class="calorie">cal</th>
          <th scope="col" class="hit">like</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "select d_id, d_name, d_cal, d_up from dietdb as A Right JOIN (SELECT * from userfavoritesdb where u_id='".$id."' and u_category=1) as B on A.d_id=B.u_favorite_id";
          $result = $mysqli->query($sql);
          while($row = $result->fetch_assoc())
          {
          ?>
        <tr>
          <td class="num"><?php echo $row['d_id']?></td>
          <td class="title">
		<a href="./recipeDetail.php?d_id=<?php echo $row['d_id']?>"><?php echo $row['d_name']?></td>
          <td class="calorie"><?php echo $row['d_cal']?></td>
          <td class="hit"><?php echo $row['d_up']?></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>
</article>
</div>
</body>
</html>
