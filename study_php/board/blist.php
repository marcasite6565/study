<!DOCTYPE html>
<meta charset="utf-8"/>
<html>

<?php
	include "../db.php";
	include "../password.php";
?>

<head>
    <meta charset="utf-8">
	<title> - board </title>
	<link href="../css/main.css" rel="stylesheet">
	<style type="text/css">
	</style>
</head>

<body>
	<div class="blist__writeBtn">
		<button class="btn blist__btn" type="button" onclick="location.href='./write.php'">글쓰기</button>
	</div>
	<table class="blist__table">
		<?php
			$sql = "select board_seq from study_php_board";
			$data = mq($sql);
			$list = mysqli_num_rows($data)+1;
			$sql = "select board_seq, board_sub, board_writer from study_php_board order by board_seq DESC";
			$sqlr = mq($sql);

			while($board=$sqlr->fetch_array()){
		?>
			<tr>
				<td class="blist__table--seq"><?php echo $board['board_seq']?></td>
				<td class="blist__table--sub"> <a href="./read.php?board_seq=<?php echo $board["board_seq"];?>"><?php echo $board['board_sub']?></a></td>
				<td class="blist__table--writer"><?php echo $board['board_writer']?></td>
			</tr>
		<?php
			}
		?>
	</table>
</body>
</html>