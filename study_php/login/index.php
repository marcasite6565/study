<!DOCTYPE html>

<html>
	<?php
	include "../db.php";
	include "../password.php";
	?>
	
<head>
	<meta charset="utf-8"/>
	<title> - LOGIN </title>
	<link href="../css/main.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php include "../menu.php"; ?>

<?php
	if(isset($_SESSION['userid'])){
		echo "<script>alert('이미 로그인 되었습니다.'); history.back();</script>";
	}else{
?>

	<div class="wrap" style="height: 100vh;">
		<div class="login">
			<form method="post" action="loginCheck.php">
				<table class="login__table">
					<tr>
						<td class="login__label">ID</td>
						<td class="login__input"><input maxlength=15 type="text" name="id" tabindex="1"/></td>
						<td rowspan=2><input class="btn login__btn--login" type="submit" tabindex="3" value="로그인"/></td>
					</tr>
					<tr>
						<td class="login__label">비밀번호</td>
						<td class="login__input"><input maxlength=15 type="password" name="pw" tabindex="2"/></td>
					</tr>
					<tr>
						<td colspan=3><a href="./join.php">회원가입 ▶</a></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php } ?>
</body>

</html>