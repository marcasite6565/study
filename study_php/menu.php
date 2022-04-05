<?php
$request_uri = $_SERVER['REQUEST_URI'];
?>

<nav class="sidenav">
	<ul>
		<li class="sidenav__list <?php if(strpos($request_uri, 'main') !== false){?>sidenav__on<?php ;}?>"><a href="../main">홈</a></li>
		<li class="sidenav__list <?php if(strpos($request_uri, 'board') !== false){?>sidenav__on<?php ;}?>"><a href="../board">게시판</a></li>
		<li class="sidenav__list <?php if(strpos($request_uri, 'memo') !== false){?>sidenav__on<?php ;}?>"><a href="../memo">메모</a></li>
		<li class="sidenav__list sidenav__login">
			<?php if(isset($_SESSION['userid'])){ ?>
				<a href="../login/logout.php">로그아웃</a>
			<?php }else{ ?>
				<a href="../login">로그인</a>
			<?php } ?>
		</li>
	</ul>
</nav>