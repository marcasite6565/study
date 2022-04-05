<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	$seq = $_GET['board_seq'];
	$sql = mq("select * from study_php_board where board_seq='".$seq."'");
	$board = $sql->fetch_array();

	$sql = "select board_seq from study_php_board";
	$data = mq($sql);

	if($board['board_writer']==$_SESSION['usernick']){
		$sql = mq("delete from study_php_board where board_seq='$seq';");

		$sql = mq("select board_seq from study_php_board");
		$data = mysqli_num_rows($sql)+1;

		if($seq<$data)
		{ 
			for ($i=$seq; $i<=$data; $i++) {
				$imsi_seq = $i+1;
				$sql = mq("update study_php_board set board_seq='$i' WHERE board_seq='$imsi_seq';");
			}
		}

		echo "<script>alert('삭제가 완료되었습니다.'); location.href='./blist.php';</script>";
	}else{
		echo "<script>alert('삭제 권한이 없습니다.'); history.back();</script>";
	}
?>