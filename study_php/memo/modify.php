<!DOCTYPE html>
<meta charset="utf-8"/>
<html>

<?php
	include "../db.php";
	include "../password.php";
?>

<head>
    <meta charset="utf-8">
	<title> - </title>
	<link href="../css/main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body onload="LoadPage(); Modify();">
	<div class="memo">

	<?php
		$seq = $_GET['memo_seq'];
		$sql = mq("select * from study_php_memo where memo_seq='".$seq."'");
		$memo = $sql->fetch_array();
		if($memo['memo_writer']==$_SESSION['usernick']){
	?>
		<div class="mwrite">
			<form action="memo_modify.php?memo_seq=<?php echo $seq; ?>" method="post">
				<textarea class="mwrite__space" name="memo_cont" type="text" required> <?php echo $memo['memo_cont'] ?></textarea>
				<input class="mwrite__btn" type="submit" value="수정"/>
			</form>
		</div>
	</div>

	<?php
		}else{
			echo "<script>alert('수정 권한이 없습니다.'); history.back();</script>";
		}
	?>
</body>
</html>