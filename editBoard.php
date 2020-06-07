<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="style/style.css" />
	<title>编辑留言</title>
</head>
<body>
	<div class="wrap-content">
		<h3>用户留言</h3>
		
		<form action="editBoardDo.php" method="post">
			<?php
			      /**
					* 第一步获取数据库连接
					*/	
					header("Conetnt-type:text/html;charset=utf-8");
					require dirname(__FILE__)."/config/config.php";
					$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
					/**
					 * 设置输出编码
					 */ 
					mysqli_query($mysqli, "set names utf8");
					/**
					 * 第二步:查询数据sql
					 */ 
					$sid = $_GET['id'];
					
					$sql = "select * from `board` where board_id = $sid";  
					$bool = mysqli_query($mysqli, $sql);
					if ($bool) {
						/**
						 * 获取数据
						 */
	                    $arr = mysqli_fetch_assoc($bool);							
					} else {
						echo $mysqli->errno;
						echo $mysqli->error;
						echo "根据上述信息，修改sql语句。";
					}
			?>
			<div>
				<input type="hidden" name="board_id" id="board_id" value="<?php echo $arr['board_id']?>"/>
				<label for="author">留言人:</label><input type="text" name="author" id="author" value="<?php echo $arr['author']?>"/>
			</div>
			<div>
				<label for="title">留言标题:</label><input type="text" name="title" id="title" value="<?php echo $arr['title']?>"/>
			</div>
			<div>
				<label for="content">留言内容:</label><textarea name="content" rows="5" cols="40"><?php echo $arr['board_content']?></textarea>
			</div>
			<div class="submit">
				<input type="submit" value="点击提交"/>
			</div>
		</form>
	</div>
</body>
</html>