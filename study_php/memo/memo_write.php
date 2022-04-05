<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	if($_SESSION['userauthor'] >= 0){
		$cont=$_POST['memo_cont'];
		$writer=$_SESSION['usernick'];

		$sql = "select memo_seq from study_php_memo";
		$data = mq($sql);
		$seq = mysqli_num_rows($data)+1;

		$date = date("Y-m-d H:i:s");

		if($writer && $seq){
			$sql = "insert into study_php_memo (memo_seq, memo_writer, memo_cont, memo_date) values ('".$seq."','".$writer."','".$cont."','".$date."');";
				mq($sql);
				echo "<script>alert('작성이 완료되었습니다.'); location.href='./';</script>";
			}

			$sql = mq("select log_seq from log");
			$data = mysqli_num_rows($sql);

			if($data!=$seq)
			{ 
				echo "<script>alert('작성이 실패하였습니다.'); history.back();</script>";
			}
	}else{
		echo "<script>alert('작성 권한이 없습니다.'); history.back();</script>";
	}
?>