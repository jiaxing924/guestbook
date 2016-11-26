<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>回复</title>
</head>
<?php
error_reporting(0);
$id = $_GET['id'];
?>
<body>
<div id="panel" style="position:fixed; left:50%; top:80%; width:500px; height:150px; margin-left:-300px; margin-top:-200px; border:1px solid #888; background-color:#edf; text-align:center">
    <form action="get.php?id=<?php echo $id?>" method="post" >
        <table border="0" width="400">
            <tr>
                <td width="100%" align="right">回复ID:</td>
                <td><?php echo $id?></td>
            </tr>
            <tr>
                <td width="100%" align="right">用户名:</td>
                <td><input type="text" name="username" value=""/></td>
            </tr>
            <tr>
                <td width="100%" align="right">邮箱:</td>
                <td><input type="email" name="email" value=""/></td>
            </tr>
            <tr>
                <td width="100%" align="right">留言内容:</td>
                <td><textarea name="content"></textarea></td>
            </tr>
            <tr>
                <td width="100%" align="right"><input type="submit" name="post" value="提交留言"/></td>
                <td><a href="index.php"><input type="button" value="返回主页" /></a></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>