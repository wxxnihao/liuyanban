<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="style/style.css" />
	<title>添加留言</title>
</head>
<body>
	<div class="header">
		<a href="logout.php">退出登录</a>
	</div>
	
	<div class="wrap-content">
		<?php
		    session_start();
			//echo $_SESSION['username'];
			/**
			 * 判断当前有误用户登陆过
			 */
			if (isset($_SESSION['username'])&& !empty($_SESSION['username'])) {
		?>
			<h3><?php echo $_SESSION['username']?>留言</h3>	
		<?php
		    } else { 	
		?>
			<h3>用户留言</h3>	
		<?php
			}
		?>	
		
		<form action="addBoardDo.php" method="post">
			<!--<div>
				<label for="author">留言人:</label><input type="text" name="author" id="author" value=""/>
			</div>-->
			<div>
				<label for="title">留言标题:</label><input type="text" name="title" id="title" value=""/>
			</div>
			<div>
				<label for="content">留言内容:</label><textarea name="content" rows="5" cols="40"></textarea>
			</div>
			<div class="submit">
				<input type="submit" value="点击提交"/>
			</div>
		</form>
	</div>
</body>
</html>