<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	if($_POST["id"] == "" || $_POST["pw"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하십시오."); history.back(); </script>';
	}else{
		$password = $_POST['pw'];
		$sql = 'select * from study_php_member where MID="'.$_POST['id'].'"';
		$sqlr = mq($sql);
		$member = $sqlr->fetch_array(MYSQLI_ASSOC);
		$hash_pw = $member['MPW'];

		if(password_verify($password, $hash_pw)){
			$_SESSION['userid'] = $member["MID"];
			$_SESSION['usernick'] = $member["NICK"];
			$_SESSION['userauthor'] = $member["AUTHOR"];
			echo "<script>alert('어서오세요, ".$_SESSION['usernick']."님.'); location.href='../main';</script>";
		}else{ 
			echo "<script>alert('아이디 혹은 비밀번호를 확인하십시오.'); history.back();</script>";
		}
	}
?>