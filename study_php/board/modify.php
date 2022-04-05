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
	<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		//<![CDATA[
		function LoadPage() {
			CKEDITOR.replace('contents');
		}

		function FormSubmit(f) {
			CKEDITOR.instances.contents.updateElement();
			if(f.contents.value == "") {
				alert("내용을 입력해 주세요."); return false;
			}
			alert(f.contents.value);
			// 전송은 하지 않습니다.
			return false;
		}
		//]]>			
	</script>

</head>
<body style="height: 851px;" onload="LoadPage(); Modify();">

<?php
	$seq = $_GET['board_seq'];
	$sql = mq("select * from study_php_board where board_seq='".$seq."'");
	$board = $sql->fetch_array();
?>

<script type="text/javascript">
	function Modify(){
		<?php
			$sql = mq("select * from study_php_board where board_seq='".$seq."'");
			$board = $sql->fetch_array();
		?>
		var data = '<?php echo nl2br("$board[board_cont]") ?>';
		CKEDITOR.instances.contents.setData(data);
	}
</script>

<?php
	if($board['board_writer']==$_SESSION['usernick']){

?>

	<form class="editor" action="board_modify.php?board_seq=<?php echo $seq; ?>" method="post" enctype="multipart/form-data">
		<textarea class="bwrite__sub" name="board_sub" maxlength="50" type="text" placeholder="제목" required><?php echo $board['board_sub']; ?></textarea>
		<textarea id="contents" class="cont" name="board_cont" type="text"></textarea>
		<div class="bwrite__btnArea">
			<input class="btn bwrite__btn" type="submit" value="수정"/>
		</div>
	</form>


<?php
	}else{
		echo "<script>alert('수정 권한이 없습니다.'); history.back();</script>";
	}
?>
</body>
</html>