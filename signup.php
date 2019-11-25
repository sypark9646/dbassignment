<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #1B823F;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
        }

       button:hover {
                opacity: 0.8;
      }
      </style>

<?php
$id=$_POST['id'];
$pwd=$_POST['pwd'];
$weight=$_POST['weight'];
$date=date('Y/m/d'); 
include 'db_connection.php';


$sql = "SELECT * from userdb WHERE u_id='$id'";
$res = mysqli_query($mysqli,$sql);
if ($res) {
	$number_of_rows = mysqli_num_rows($res);
	if($number_of_rows==1)
	{
		echo "<center><h2>Duplicate ID</h2></center><br>";
		echo "<center><a href=signupPage.html>back page</a></center>";
		exit();
	}   
}

try{
$mysqli->autocommit(FALSE); // i.e., start transaction
$transactionres=$mysqli->query("INSERT INTO userdb(u_id, u_pwd, u_weight) VALUES ('$id', '$pwd', '$weight')");
if(!$transactionres){
$transactionres->free();
throw new Exception($mysqli->error);
}
$transactionres=$mysqli->query("INSERT INTO userinfodb(u_id, u_date, u_weight, u_calSum) VALUES ('$id', '$date', '$weight', 0)");
if(!$transactionres){
$transactionres->free();
throw new Exception($mysqli->error);
}

/* commit insert */
$mysqli->commit();
$mysqli->autocommit(TRUE);/*end transaction*/


echo "<center><h2>Signup Success!</h2></center><br>";
}catch(Exception $e){
$mysqli->rollback();
$mysqli->autocommit(TRUE);
echo "<center><h2>Failed Transaction!</h2></center><br>";
}
?>

<center><button onclick="location.href='./loginPage.html'">GO to login</button></center>
</html>