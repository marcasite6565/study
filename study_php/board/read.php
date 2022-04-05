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

</head>
<body>

<?php
	$seq = $_GET['board_seq'];
	$sql = mq("select * from study_php_board where board_seq='".$seq."'");
	$board = $sql->fetch_array();

	if($board){
?>

	<div class="bread">
		<table class="bread__top">
			<tr>
				<td class="bread__subject" colspan="2">
					<?php echo $board['board_sub']; ?>
				</td>
			</tr>
			<tr>
				<td class="bread__info" style="text-align: left;">작성자 : <?php echo $board['board_writer']; ?></td>
				<td class="bread__info" style="text-align: right;">작성일 : <?php echo $board['board_date']; ?></td>
			</tr>
		</table>

		<div class="bread__content">
			<?php echo nl2br("$board[board_cont]"); ?>
		</div>

		<table class="bread__button">
			<tr>
				<?php if($board['board_writer']==$_SESSION['usernick']){ ?>
					<td><button class="btn blist__btn" type="button" onclick="location.href='./modify.php?board_seq=<?php echo $board['board_seq']; ?>'">MODIFY</button></td>
					<td><button class="btn blist__btn" type="button" onclick="location.href='./delete.php?board_seq=<?php echo $board['board_seq']; ?>'">DELETE</button></td>
				<?php } ?>
				<td style="text-align: right; width: 75%;">
					<button class="btn blist__btn" type="button" onclick="location.href='./blist.php'">LIST</button>
				</td>
			</tr>
		</table>
	</div>

<?php
	}else{
		echo "<script>alert('해당 글이 존재하지 않습니다.'); history.back();</script>";
	}
?>

</body>
</html>