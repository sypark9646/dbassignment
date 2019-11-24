<?php
  include 'db_connection.php';
  include('navigationbar.html');
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
  <h2 align=center>Exercise</h2>
  <div id="boardList">
    <div align=right>
      <form action="exercise.php" method="post">
        <input type="text" id="search" placeholder="Enter the search word" name="search" required>
        <button type="submit" class="btn btn-default">search</button>
      </form>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col" class="no">
            <a href="./exercise.php?order_by=e_id">num</th>
          <th scope="col" class="title">name</th>
          <th scope="col" class="calorie">
            <a href="./exercise.php?order_by=e_cal">cal</th>
          <th scope="col" class="hit">
            <a href="./exercise.php?order_by=e_up">like</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(isset($_GET['order_by'])) $order_by=$_GET['order_by'];
          else $order_by='e_id';
          if($order_by == 'e_id') $order='ASC';
          else $order='DESC';

          if(isset($_POST['search'])){
            $search=$_POST['search'];
            $sql = "select * from exercisedb where upper(e_name) like upper('%$search%') order by $order_by $order";
          }
          else{
            $sql = "select * from exercisedb order by $order_by $order";
          }
          $result = $mysqli->query($sql);
          while($row = $result->fetch_assoc())
          {
          ?>
        <tr>
          <td class="num"><?php echo $row['e_id']?></td>
          <td class="title">
		<a href="./exerciseDetail.php?e_id=<?php echo $row['e_id']?>"><?php echo $row['e_name']?></td>
          <td class="calorie"><?php echo $row['e_cal']?></td>
          <td class="hit"><?php echo $row['e_up']?></td>
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
