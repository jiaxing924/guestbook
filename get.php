<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 15:14
 */
header("content-type;text/html;charset=UTF-8");
include_once 'config.php';
$post = $_POST['post'];
$id = $_GET['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$content = $_POST['content'];
if(empty($post)){
    echo "<script>alert('提交姿势错误');location.href='index.php'</script>";
}elseif(empty($username)){
    echo "<script>alert('提交姿势错误(未填写用户名)');location.href='index.php'</script>";
}elseif(empty($email)){
    echo "<script>alert('提交姿势错误(未填写邮箱)');location.href='index.php'</script>";
}elseif(empty($content)){
    echo "<script>alert('提交姿势错误(未填写内容)');location.href='index.php'</script>";
}else{
    if(!empty($id)){
        $check = mysql_query("select * from message where id =".$id);
        if(mysql_fetch_assoc($check)){
            $sql = "insert into reply set mid='".$id."',username='".$username."',email='".$email."',content= '".$content."'";
            $result = mysql_query($sql);
            if($result){
                echo "<script>alert('回复成功');location.href='index.php'</script>";
            }else{
                echo "<script>alert('回复失败');location.href='index.php'</script>";
            }
        }else{
            echo "<script>alert('没有找到要回复的主题');location.href='index.php'</script>";
        }
    }else{
        $sql = "insert into message set username='".$username."',email='".$email."',content= '".$content."'";
        $result = mysql_query($sql);
        if($result){
            echo "<script>alert('留言成功');location.href='index.php'</script>";
        }else{
            echo "<script>alert('留言失败');location.href='index.php'</script>";
        }
    }
}