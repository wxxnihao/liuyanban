<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="style/board.css"/>
	<title>留言列表</title>
</head>
<body>
	<div class="header">
		<span>
			<em><?php session_start(); echo $_SESSION['username']?></em>
			&nbsp;&nbsp;&nbsp;您好，欢迎您进入留言板······</span>
		    &nbsp;&nbsp;&nbsp;&nbsp;
		<a href="addBoard.php" class="toboard">去添加留言</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logout.php" class="tologout">退出登录</a>
	</div>
	
	<div class="board-list">
		<?php
		    header("Content-type:text/html;charset=utf-8");
			/**
			 * 设置默认时区
			 */
//			date_default_timezone_set('Asia/Shanghai');
//			/**
//			 * 获取提交信息
//			 */
//			$author = $_POST['author'];
//			$title = $_POST['title'];
//			$content = $_POST['content'];
//		    $time = time();
//			$current_time = date("Y-m-d H:i:s",$time);
			
			/**
			 * 第一步：连接数据库
			 */
			include dirname(__FILE__)."/config/config.php";
			$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
			/**
			 * 设置查询结果集编码格式
			 */
			mysqli_query($mysqli, 'set names utf8');
		    /**
			 * 第二步：创建sql语句
			 */
			$sql = "select * from `board` order by board_time desc"; 
			
			$bool = mysqli_query($mysqli, $sql);
			if ($bool){
				/**
				 * 定义翻页的变量
				 */
				$page = isset($_GET['page'])?$_GET['page']:1;
				//求表中的总记录条数
				$count = mysqli_num_rows($bool);
				//每页显示的条数
				$pageSize = 5;
				$pageCount = ceil($count/$pageSize);
				//偏移量offset = (当前页-1)*每页显示条数
				$offset = ($page*$pageSize == 0)?$pageSize:$page*$pageSize;
				//$sql1 = "select * from `board` order by board_time desc limit 0,$offset";
				$sql1 = "SELECT board.*,user.iconhead 
				         FROM `board` LEFT JOIN `user` 
				         ON board.author = user.username 
				         ORDER BY board_time DESC LIMIT  0,$offset;";
			    
				$outcome = mysqli_query($mysqli, $sql1);
				while ($arr = mysqli_fetch_assoc($outcome)){
				//$sql3 = "select * from `user` where username in (select author from `board`)";
			    //$icon = mysqli_query($mysqli, $sql3);
	    ?>
		    	<div class="item">	
					<div class="head">
						<?php 							
							if ($arr['iconhead']!=""){
							$iconPath = dirname($_SERVER['SCRIPT_NAME']).'/'.UPLOAD_DIR.'/'.$arr['iconhead'];						    
						?>		
					        <img src="<?php echo $iconPath;?>"/>	
						<?php			
							} else {
						?>
							<img src="img/下载.jpg"/>
						<?php  	
							}
						?>
						<span><?php echo $arr['author']?></span>
					</div>
					<div class="content">
						<p><?php echo $arr['board_content']?></p>
					</div>	
					<div class="foot">
						<time><?php echo $arr['board_time']?></time>
						<a class="reply-click"><em class="reply-item"><?php echo $arr['board_id']?></em>回复</a>
						<a href="editBoard.php?id=<?php echo $arr['board_id']?>">编辑</a>
						<a href="deleteBoard.php?id=<?php echo $arr['board_id']?>">删除</a>
					</div>
		<?php
			
			    $sql2 = "SELECT replier,reply_content FROM reply WHERE board_id = ".$arr['board_id'];
				$result = mysqli_query($mysqli, $sql2);
				if ($result) {
					while ($arr1 = mysqli_fetch_assoc($result)){	
		?>
						<div class="reply">
							<p><em><?php echo $arr1['replier']?>&nbsp;:&nbsp;</em>回复<em>&nbsp;<?php echo $arr['author']?>&nbsp;:</em>&nbsp;<?php echo $arr1['reply_content']?></p>
						</div>
						
						<!--<div class="textarea">
							<form action="" method="post">
								<textarea name="reply" rows="5" cols="80"></textarea>
								<input class="submit-reply" type="submit" value="回复"/>
							</form>
						</div>-->
	    <?php
			    
					}
				}else {
					echo $mysqli->errno;
					echo $mysqli->error;
					echo "根据错误信息，检查和数据库连接sql语句！！！";
				}
        ?>
                    <!--注意这边把大括号叉开，不要放在while循环里面-->
                    </div>
        <?php	
			    }
			} else {
				echo $mysqli->errno;
				echo $mysqli->error;
				echo "根据错误信息，检查和数据库连接sql语句！！！";
			}
			/**
			 * 关闭数据库
			 */
			mysqli_close($mysqli);
		?>
	</div>
	
	<div class="show_more">
		<a href="main.php?page=<?php echo ($page+1>$pageCount)?$pageCount:$page+1;?>">
		<?php 
		   if ($page == $pageCount) {
		   	  echo "没有啦····>>";
		   } else {
		   	  echo "显示更多 ···>>";
		   }
		   
		?>	
			
		</a>
	</div>
	
	<script type="text/javascript" src="js/reply.js" ></script>
</body>
</html>