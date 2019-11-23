<?php
session_start();
$id=$_SESSION['userid'];
include 'db_connection.php';
include('navigationbar.html');
include('updateUserinfo.html');

include('mypage_favorites_buttons.html');
include 'draw_weight.php';
?>