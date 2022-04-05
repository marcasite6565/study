<meta charset="utf-8"/>

<html>
	<?php
	include "../db.php";
	include "../password.php";
	?>
	
<head>
    <meta content="text/html" charset="utf-8">
	<title> - BOARD </title>
	<link href="../css/main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php include "../menu.php"; ?>

	<div class="wrap">
		<div class="board">
			<iframe src="./blist.php" name="b_iframe" width="100%" onload="this.style.height=this.contentWindow.document.body.scrollHeight+60;" frameborder="0" scrolling="No"></iframe>
		</div>
	</div>
</body>
</html>