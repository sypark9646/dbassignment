<?php
  
  include 'db_connection.php';
  $mysqli->set_charset('utf8');
  $b_id = $_GET['b_id'];

  $sql = "select b_title, b_content from boarddb where b_id = ".$b_id;
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
?>

<html>
<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

                /* Change the link color to #111 (black) on hover */
                li a:hover {
                    background-color: #111;
                }

        .active {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="board.php">BOARD</a></li>
        <li><a href="recipe.php">RECIPE</a></li>
        <li><a href="exercise.php">EXERCISE</a></li>
        <li><a href="mypage.php">MYPAGE</a></li>
        <li style="float:right"><a class="active" href="logout.php">logout</a></li>
    </ul>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Posting</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container" style="width:700">
  <h2 align=center>Posting</h2>

  <form action="/edit.php?b_id=<?php echo $b_id?>" method="post">

    <div class="form-group">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title"
       value="<?php echo $row['b_title']?>"
       placeholder="type title(4-100)" name="title"
       maxlength="100" required="required"
       pattern=".{4,100}">
    </div>

    <div class="form-group">
      <label for="content">content</label>
      <textarea class="form-control" rows="10" id="content"
      name="content" placeholder="type content"><?php echo $row['b_content']?></textarea>
    </div>

    <button type="back" class="btn btn-default" onclick="location.href='board.php'">back</button>
    <button type="submit" class="btn btn-default" style="float: right;">edit</button>
  </form>

</div>
</body>
</html>