<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	$seq = $_GET['board_seq'];
	$sql = mq("select * from study_php_board where board_seq='".$seq."'");
	$board = $sql->fetch_array();

	if($board['board_writer']==$_SESSION['usernick']){
		$sub=$_POST['board_sub'];
 		$cont=$_POST['board_cont'];

 		$cont=str_replace("\r", "", $cont);
 		$cont=str_replace("\n", "", $cont);
 		$cont=str_replace("&nbsp;", "", $cont);
 		$cont=str_replace("&lt;", "<", $cont);
 		$cont=str_replace("&gt;", ">", $cont);

			$sql = "update study_php_board set board_sub='".$sub."' WHERE board_seq='".$seq."'";
 			mq($sql);

 			$sql = "update study_php_board set board_cont = '".$cont."' WHERE board_seq='".$seq."';";
 			mq($sql);
			echo "<script>alert('수정이 완료되었습니다.'); location.href='./read.php?board_seq=".$seq."';</script>";

	}else{
		echo "<script>alert('수정 권한이 없습니다.'); history.back();</script>";
	}
?>