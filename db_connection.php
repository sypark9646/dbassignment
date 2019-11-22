<?php
	
    $mysqli = new mysqli("localhost", 'root', '', 'dbassignment');



if (mysqli_connect_error()) {
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}


?>