<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
	<title> - JOIN </title>
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
			<form method="post" action="memberSave.php" id="saveform">
				<table class="login__table">
					<tr>
						<td class="login__label">ID</td>
						<td class="login__input"><input maxlength=15 type="text" name="id"/></td>
					</tr>
					<tr>
						<td class="login__label">비밀번호</td>
						<td class="login__input"><input maxlength=15 type="password" name="pw"/></td>
					</tr>
					<tr>
						<td colspan=2 style="font-weight: normal; font-size: 13px;">
							아이디와 비밀번호는 최대 15자까지 가능합니다.
							<br/>
							<br/>
						</td>
					</tr>
					<tr>
						<td class="login__label">성함</td>
						<td class="login__input"><input maxlength=30 type="text" name="name"/></td>
					</tr>
					<tr>
						<td class="login__label">닉네임</td>
						<td class="login__input"><input maxlength=15 type="text" name="nickname"/></td>
					</tr>
					<tr>
						<td class="login__label">이메일</td>
						<td class="login__input"><input maxlength=30 type="email" name="email"/></td>
					</tr>
					<tr>
						<td colspan=2>
							<input class="btn login__btn--join" type="submit" value="회원가입"/>
						</td>
					</tr>
				</table>
			</form>
		</div> 
	</div>

	<?php } ?>

</body>

</html>