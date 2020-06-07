<?php
 header("Content-type:text/html;charset=utf-8");
	
	include dirname(__FILE__)."/config/config.php";
	/**
	 * 第一步：连接数据库
	 */
	$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
	session_start();
	/**
	 * 设置查询结果集编码格式
	 */
	mysqli_query($mysqli, 'set names utf8');
	
	date_default_timezone_set('Asia/Shanghai');
	/**
	 * 获取提交信息
	 */
	$username = $_POST['username'];
	$password = md5($_POST['password']);
//	$admin = "admin";
//	$iconhead = "";
//  $time = time();
//	$current_time = date("Y-m-d H:i:s",$time);
    /**
	 * 第二步：创建sql语句
	 */
	$sql = "select * from `user` where `username`='".$username."' and `password`='".$password."'";
    
	echo "$sql";
	echo "<br>";
	$bool = mysqli_query($mysqli, $sql);

	if ($bool) {
		
		echo "用户登录成功！！！,<br>";
		$count = mysqli_num_rows($bool);

		
		if ($count>0) {
			/**
			 * 记录当前用户信息
			 */
			$userid = $arr['user_id'];
			$_SESSION['user_id'] = $userid;
			$_SESSION['username'] = $username;
			//跳转到主页面
			header("location:main.php");
		} else {
			echo "用户登录失败！！！！,<br>";
			header("location:login.php");
		}
	} else {
		echo $mysqli->errno;
		echo "<br>";
		echo $mysqli->error;
		echo "<br>";
		echo "根据错误信息，检查sql语句。<br>";
	}
	/**
	 * 关闭数据库
	 */
	mysqli_close($mysqli); 
?>