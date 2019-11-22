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
    <?php include 'recipe_table.php';?>
</body>
</html>