<?php
	echo "<table style='border: solid 1px black;'>";
	echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

	class TableRows extends RecursiveIteratorIterator 
	{
	function __construct($it) 
	{
	parent::__construct($it, self::LEAVES_ONLY);
	}
	function current() 
	{
	return "<td style='width:100%;border:1px solid black;'>" . parent::current(). "</td>";
	}
	function beginChildren() {
	echo "<tr>";
       	}
	function endChildren() {
        	echo "</tr>" . "\n";
    	}
    	}

    	try 
	{
    		$conn = new PDO("mysql:host=localhost;dbname=dbassignment", 'root', '');
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$stmt = $conn->prepare("SELECT d_name, d_cal, d_up FROM dietdb");
    		$stmt->execute();

    		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    		foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) 
		{
    		echo $v;
    		}
    	}catch(PDOException $e) 
	{
    		echo "Error: " . $e->getMessage();
    	}
    	$conn = null;
    	echo "</table>";
?>