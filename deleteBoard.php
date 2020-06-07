<?php

    header("Content-type:text/html;charset=utf-8");
	//注意：永远都是接收参数的页面不能直接运行
	//第一步：链接数据库
	
	require dirname(__FILE__).'/config/config.php';
	$mysqli = new mysqli(DB_LOCAL_HOST,DB_USER,DB_PASS_WORD,DB_NAME);
	//第二步：执行删除的sql语句
	//接收Get方式的参数
	$sid = $_GET['id']; //接收的是参名
	$sql = "delete from `reply` where board_id = $sid";
	$result = "delete from `board` where board_id = $sid";
	//第三步：执行sql语句
	$bool = mysqli_query($mysqli,$sql);
	$bolean = mysqli_query($mysqli,$result);
	
	if($bool){
	    $rows = mysqli_affected_rows($mysqli);
	    if($rows>0) {
	        //echo '删除回复信息成功';
	        header("location:main.php");
	        //添加成功、删除成功、 编辑数据成功之后都要跳转到显示页面
	    }else{
	        echo '删除回复信息失败';
	    }
	}else{
	    echo '请检查sql语句';
	}
	
	if($bolean){
	    $rows = mysqli_affected_rows($mysqli);
	    if($rows>0) {
	        //echo '删除留言信息成功';
	        header("location:main.php");
	        //添加成功、删除成功、 编辑数据成功之后都要跳转到显示页面
	    }else{
	        echo '删除留言信息失败';
	    }
	}else{
	    echo '请检查sql语句';
	}
	//第四步：关闭数据库链接
	mysqli_close($mysqli);
?>