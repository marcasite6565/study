<meta charset="utf-8"/>

<?php
	include "../db.php";
	include "../password.php";

	$seq = $_GET['memo_seq'];
	$sql = mq("select * from study_php_memo where memo_seq='".$seq."'");
	$memo = $sql->fetch_array();

	$sql = "select memo_seq from study_php_memo";
	$data = mq($sql);

	if($memo['memo_writer']==$_SESSION['usernick']){
		$sql = mq("delete from study_php_memo where memo_seq='$seq';");

		$sql = mq("select memo_seq from study_php_memo");
		$data = mysqli_num_rows($sql)+1;

		if($seq<$data)
		{ 
			for ($i=$seq; $i<=$data; $i++) {
				$imsi_seq = $i+1;
				$sql = mq("update study_php_memo set memo_seq='$i' WHERE memo_seq='$imsi_seq';");
			}
		}

		echo "<script>alert('삭제가 완료되었습니다.'); location.href='./';</script>";
	}else{
		echo "<script>alert('삭제 권한이 없습니다.'); history.back();</script>";
	}
?>