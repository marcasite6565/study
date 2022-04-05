 <?php
 	session_start();

	$host = '';
 	$user = '';
 	$pw = '';
 	$dbName = '';
 	$db = mysqli_connect($host, $user, $pw, $dbName);
 	$db->set_charset("utf8");

  	function mq($sql){
    	global $db;
    	return $db->query($sql);
  	}

  ?>