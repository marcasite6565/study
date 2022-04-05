<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";
	
 	$MID=$_POST['id'];
 	$MPW=password_hash($_POST['pw'], PASSWORD_DEFAULT);
 	$name=$_POST['name'];
 	$nick=$_POST['nickname'];
 	$email=$_POST['email'];

	$sql1 = 'select MID from study_php_member where MID="'.$MID.'"';
	$sqlr1 = mq($sql1);
	$row = $sqlr1->fetch_array();
	$str = strcmp($MID, $row);

	if(!$str){
		echo "<script>alert('동일한 아이디가 존재합니다.'); history.back();</script>";
	}else{ 
		$sql = 'insert into study_php_member (MID, MPW, NAME, NICK, EMAIL) values ("'.$MID.'","'.$MPW.'","'.$name.'","'.$nick.'","'.$email.'")';
		$result = mysqli_query($db, $sql);
		if($result === false){
			echo mysqli_error($db);
		}

 		$_SESSION['userid'] = $MID;
		$_SESSION['usernick'] = $nick;
		$_SESSION['userauthor'] = '0';

		echo "<script>alert('회원가입이 완료되었습니다. ".$_POST['name']."님, 환영합니다.'); location.href='../main';</script>";
	}
?>