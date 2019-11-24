<?php
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
    <div align=right>
      <form action="recipe.php" method="post">
        <input type="text" id="search" placeholder="Enter the search word" name="search" required>
        <button type="submit" class="btn btn-default">search</button>
      </form>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col" class="no">
            <a href="./recipe.php?order_by=d_id">num</th>
          <th scope="col" class="title">name</th>
          <th scope="col" class="calorie">
            <a href="./recipe.php?order_by=d_cal">cal</th>
          <th scope="col" class="hit">
            <a href="./recipe.php?order_by=d_up">like</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($_GET['order_by'])) $order_by=$_GET['order_by'];
          else $order_by='d_id';
          if($order_by == 'd_up') $order='DESC';
          else $order='ASC';

          if(isset($_POST['search'])){
            $search=$_POST['search'];
            $sql = "select * from dietdb where upper(d_name) like upper('%$search%') order by $order_by $order";
          }
          else{
            $sql = "select * from dietdb order by $order_by $order";
          }
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
