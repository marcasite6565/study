<!DOCTYPE html>
<meta charset="utf-8"/>
<html>

<?php
	include "../db.php";
	include "../password.php";
?>

<head>

    <meta charset="utf-8">
	<title> - WRITE </title>
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
<body style="height: 851px;" onload="LoadPage();">

<?php
if($_SESSION['userauthor']>0){
?>

	<form class="editor" action="board_write.php" method="post" enctype="multipart/form-data">
		<textarea class="bwrite__sub" name="board_sub" maxlength="50" type="text" placeholder="제목" required></textarea>
		<textarea id="contents" class="cont" name="board_cont" type="text"></textarea>
		<div class="bwrite__btnArea">
			<input class="btn bwrite__btn" type="submit" value="작성"/>
		</div>
	</form>


<?php
	}else{
		echo "<script>alert('작성 권한이 없습니다.'); history.back();</script>";
	}
?>
</body>
</html>