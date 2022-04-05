<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	$seq = $_GET['memo_seq'];
	$sql = mq("select * from study_php_memo where memo_seq='".$seq."'");
	$log = $sql->fetch_array();

	if($log['memo_writer']==$_SESSION['usernick']){
 		$cont=$_POST['memo_cont'];
 		$writer=$_SESSION['usernick'];

		$sql = "update study_php_memo set memo_cont='".$cont."' WHERE memo_seq='".$seq."'";
 		mq($sql);
		echo "<script>alert('작성이 완료되었습니다.'); location.href='./';</script>";
	}

		$sql = mq("select log_seq from log");
		$data = mysqli_num_rows($sql);

		if($data!=$seq)
		{ 
			echo "<script>alert('작성이 실패하였습니다.'); history.back();</script>";
	}else{
		echo "<script>alert('작성 권한이 없습니다.'); history.back();</script>";
	}
?>