<?php
	
    $mysqli = new mysqli("localhost", 'root', '', 'team12');



if (mysqli_connect_error()) {
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}


?>