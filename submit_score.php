<?php
if(!empty($_REQUEST['name']) && !empty($_REQUEST['score']))
{
	# Connect to database
	$host = "us-cdbr-azure-west-b.cleardb.com";
    $user = "b206a5b141e41b";
    $pwd = "a3898281";
    $db = "TestUnityClearDB";
    // Connect to database.
    
    $conn = mysql_connect($host, $user, $pwd) or die ("Error: " . mysql_error());
	if($conn){
		mysql_select_db($db);
	} else {
		echo "error #1";
		die();
	}
	
	$name = mysql_real_escape_string($_REQUEST['name']);
	$score = mysql_real_escape_string($_REQUEST['score']);
	
	# Insert into db
	$sql = mysql_query(
				"INSERT INTO highscores (`name`, `score`) VALUES ('".$name."', '".$score."')
				")
			 or die ("Error #2: " . mysql_error());
			 
	if($sql){
		echo "success";
	} else {
		echo "error #3";
	}
}
?>