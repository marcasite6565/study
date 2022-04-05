<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	if($_SESSION['userauthor']>0){
		$sub=$_POST['board_sub'];
		$date=date("Y-m-d");
		$cont=$_POST['board_cont'];
		$writer=$_SESSION['usernick'];
		echo "<script>alert('1번');';</script>";

		$cont=str_replace("\r", "", $cont);
		$cont=str_replace("\n", "", $cont);
		$cont=str_replace("&nbsp;", "", $cont);
		$cont=str_replace("&lt;", "<", $cont);
		$cont=str_replace("&gt;", ">", $cont);
		echo "<script>alert('2번');';</script>";

		$sql = "select board_seq from study_php_board";
		$data = mq($sql);
		$seq = mysqli_num_rows($data)+1;
		echo "<script>alert('".$seq."');';</script>";

			if($writer && $seq){
				$sql = "insert into study_php_board (board_seq, board_sub, board_date, board_writer, board_cont) values ('".$seq."','".$sub."','".$date."','".$writer."','".$cont."');";
				$result = mysqli_query($db, $sql);
				if($result === false){
					echo mysqli_error($db);
				}
				
				echo "<script>alert('작성이 완료되었습니다.'); location.href='./read.php?board_seq=".$seq."';</script>";

			}

			$sql = mq("select board_seq from study_php_board");
			$data = mysqli_num_rows($sql);

			/*if($data!=$seq)
			{ 
				echo "<script>alert('작성이 실패하였습니다.'); history.back();</script>";
			}*/

	}else{
		echo "<script>alert('작성 권한이 없습니다.'); history.back();</script>";
	}
?>