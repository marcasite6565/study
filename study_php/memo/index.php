<meta charset="utf-8"/>

<html>
	<?php
	include "../db.php";
	include "../password.php";
	?>
	
<head>
    <meta content="text/html" charset="utf-8">
	<title> - MEMO </title>
	<link href="../css/main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php include "../menu.php"; ?>

	<div class="wrap">
		<div class="memo">
			<div class="mwrite">
				<form action="memo_write.php" method="post">
					<textarea class="mwrite__space" name="memo_cont" type="text" placeholder="내용을 적으세요." required></textarea>
					<input class="mwrite__btn btn" type="submit" value="글쓰기"/>
				</form>
			</div>

			<?php
			if(isset($_GET['page'])){$page = $_GET['page'];}
			else{$page = 1;}

			$sql = "select * from study_php_memo order by memo_seq DESC";
			$memo = mq($sql);
			$list = mysqli_num_rows($memo)+1;
			$countnum = mysqli_num_rows($memo);
			$pageNum = 3;
			$block_ct = 5;
			$block_num = ceil($page/$block_ct);
			$block_start = (($block_num - 1) * $block_ct) + 1;
			$block_end = $block_start + $block_ct - 1;
			$total_page = ceil($countnum / $pageNum);
			if($block_end > $total_page) $block_end = $total_page;
			$total_block = ceil($total_page/$block_ct);
    		$start_num = ($page-1) * $pageNum;

			$sql = "select * from study_php_memo order by memo_seq DESC limit $start_num, $pageNum";
			$memo = mq($sql);
			?>
			<div class="mlist">
			<?php
			while($row=$memo->fetch_array()){
			?>
				<table class="mlist__table" id="mli">
					<tr>
						<td class="mlist__writer">
							<?php echo $row['memo_writer']?>
							<?php if($row['memo_writer']==$_SESSION['usernick']){?>
								&nbsp&nbsp&nbsp&nbsp<a href="./modify.php?memo_seq=<?php echo $row['memo_seq']; ?>">수정</a>
								&nbsp&nbsp<a href="./delete.php?memo_seq=<?php echo $row['memo_seq']; ?>">삭제</a>
							<?php }?>
						</td>
						<td class="mlist__date"><?php echo $row['memo_date']?></td>
					</tr>
					<tr>
						<td class="mlist__cont" colspan="2"><div><?php echo nl2br("$row[memo_cont]");?></div></td>
					</tr>
				</table>
			<?php } ?>
			</div>
			<div class="mpage">
			<?php
			if($total_page > 1){
				if($page <= 1){ 
					echo "<span class='mpage__on'>처음</span>";
				}else{
					echo "<span><a class='mpage__notOn' href='?page=1#mli'>처음</a></span>"; 
				}
				
				if($page <= ceil($block_ct/2)){
					for($i=$block_start; $i<=$block_end; $i++){ 
						if($page == $i){ 
							echo "<span class='mpage__on'> [$i] </span>"; 
						}else{
							echo "<span><a class='mpage__notOn' href='?page=$i#mli'> [$i] </a></span>";
						}
					}
				}elseif($page >= $total_page-ceil($block_ct/2)){
					for($i=$total_page-$block_ct+1; $i<=$total_page; $i++){
						if($page == $i){
							echo "<span class='mpage__on'> [$i] </span>";
						}else{
							echo "<span><a class='mpage__notOn' href='?page=$i#mli'> [$i] </a></span>";
						}
					}
				}else{
					for($i=$block_start-floor($block_ct/2); $i<=$page+ceil($block_ct/2); $i++){ 
						if($page == $i){ 
							echo "<span class='mpage__on'> [$i] </span>"; 
						}else{
							echo "<span><a sclass='mpage__notOn' href='?page=$i#mli'> [$i] </a></span>";
						}
					}
				}

				if($page >= $total_page){ 
					echo "<span class='mpage__on'> 끝</span>"; 
				}else{
					echo "<span><a class='mpage__notOn' href='?page=$total_page#mli'>끝</a></span>";
				}
			} ?>
			</div>
		</div>
	</div>
</body>
</html>