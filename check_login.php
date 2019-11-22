<?php
session_start();
$id=$_POST['id'];
$pwd=$_POST['pwd'];
include 'db_connection.php';

    $sql = "SELECT * from userdb WHERE u_id='$id'";
    $res = mysqli_query($mysqli,$sql);
    if ($res){
        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
            if($row['u_pwd']==$pwd){
                $_SESSION['userid']=$id;
                if(isset($_SESSION['userid'])){
                    header('Location: ./mypage.html');
                }//if
	else{
	        echo "세션 저장 실패";
	}//else
           }//if
          else{
                echo "ID 또는 PWD가 틀렸습니다.";
          }//else
        }//while
    }//if
    else{
        echo "ID 또는 PWD가 틀렸습니다.";
    }
    mysqli_free_result($res);
    mysqli_close($mysqli);

?>