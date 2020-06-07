<?php
   header("Content-type:text/html;charset=utf-8");
	//注意：永远都是接收参数的页面不能直接运行
	//第一步：链接数据库
	session_start();
	require dirname(__FILE__).'/config/config.php';
	$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
	
	mysqli_query($mysqli, 'set names utf8');
	//第二步：执行删除的sql语句
	//接收Get方式的参数
	$repiler = $_SESSION['username'];
	$board_id = $_GET['id']; //接收的是参名
	$reply_content = $_GET['reply_content']; //接收的是参名
	
	
	echo "数据库id:$board_id<br>";
	echo "回复人：$repiler<br>";
	echo "回复内容：$reply_content<br>";
     /**
	 * 设置默认时区
	 */
	date_default_timezone_set('Asia/Shanghai');
	$time = time();
	$current_time = date("Y-m-d H:i:s",$time);
	$sql = "insert into `reply`(`replier`,`reply_content`,`reply_time`,`board_id`)
	values('".$repiler."','".$reply_content."','".$current_time."','".$board_id."')";
	$bool = mysqli_query($mysqli,$sql);
	if($bool){
	    $rows = mysqli_affected_rows($mysqli);
	    if($rows>0) {
	        echo '增加回复信息成功';
			//添加成功、删除成功、 编辑数据成功之后都要跳转到显示页面
	        header("location:main.php");
	    }else{
	        echo '删除学员信息失败';
	    }
	}else{
	    echo '请检查sql语句';
	}
	//第四步：关闭数据库链接
	mysqli_close($mysqli);
?>
