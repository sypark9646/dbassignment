<?php
  include('navigationbar.html');
  include 'db_connection.php';
  $mysqli ->set_charset('utf8');
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
  <h2 align=center>Board</h2>
  <div id="boardList">
    <div class="btnSet">
      <button class="btn btn-default" onclick="location.href='postingPage.html'">posting</button>
    </div>
    <table>
      <thead>
        <tr>
          <th scope="col" class="no">num</th>
          <th scope="col" class="title">title</th>
          <th scope="col" class="author">writer</th>
          <th scope="col" class="date">date</th>
          <th scope="col" class="hit">view</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = 'select * from boarddb order by b_id desc';
          $result = $mysqli ->query($sql);
          while($row = $result->fetch_assoc())
          {
            $datetime = explode(' ', $row['b_date']);
            $date = $datetime[0];
            $time = $datetime[1];
            if($date == Date('Y-m-d'))
              $row['b_date'] = $time;
            else
              $row['b_date'] = $date;
          ?>
        <tr>
          <td class="num"><?php echo $row['b_id']?></td>
          <td class="title">
		<a href="./viewPage.php?b_id=<?php echo $row['b_id']?>"><?php echo $row['b_title']?></td>
          <td class="writer"><?php echo $row['u_id']?></td>
          <td class="date"><?php echo $row['b_date']?></td>
          <td class="hit"><?php echo $row['b_views']?></td>
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
