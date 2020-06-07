<?php 
    header("Content-type:text/html;charset=utf-8");
	/**
	 * 设置默认时区
	 */
	date_default_timezone_set('Asia/Shanghai');
	/**
	 * 获取提交信息
	 */
	session_start();
	//$author = $_POST['author'];
	$author = $_SESSION['username'];
	$title = $_POST['title'];
	/**
	 * addslashes()转义字符
	 */
	$content = addslashes($_POST['content']);
	var_dump($content);
    $time = time();
	$current_time = date("Y-m-d H:i:s",$time);
	include dirname(__FILE__)."/config/config.php";
	/**
	 * 第一步：连接数据库
	 */
	$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
	/**
	 * 设置查询结果集编码格式
	 */
	mysqli_query($mysqli, 'set names utf8');
    /**
	 * 第二步：创建sql语句
	 */
	$sql = "insert into `board`(`author`,`title`,`board_content`,`board_time`)
	        values('".$author."','".$title."','".$content."','".$current_time."')"; 
	$bool = mysqli_query($mysqli, $sql);
	var_dump($sql);
	if ($bool) {
		$rows = mysqli_affected_rows($mysqli);//添加，删除，修改时才用
		if ($rows>0) {
			header("location:main.php");
		} else {
			echo "数据插入数据库错误！！！！,<br>";
		}
		
	} else {
		echo $mysqli->errno;
		echo "<br>";
		echo $mysqli->error;
		echo "<br>";
		echo "根据错误信息，检查sql语句。<br>";
	}
	
?>