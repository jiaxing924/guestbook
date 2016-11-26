<?php
include_once 'config.php';
$sql = "select * from `message`";
$result = mysql_query($sql);
$t =array();
$i = 0;$j = 0;
while ($test = mysql_fetch_assoc($result)){
        $t[$i] = $test;
        $i++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>留言板</title>
</head>
<style type="text/css">
    body{margin: 0px;list-style: none}
    .wrap{height: auto;width: 1000px;margin:0 auto}
    .img{background-image: url("img/img.jpeg");width: 700px;height: 395px;margin:0 auto}
    .message{border: dashed 1px #cccccc;margin-top: 40px;}
    .reply{border: dashed 1px #cccccc;}
    .title h3{display: inline-block;margin-left: 20px}
    .title a{margin-left: 30px}
    .say{width: 930px;border:#cccccc solid 1px;border-radius: 20px;margin-left: 50px;margin-bottom: 10px;}
    .content{margin-left: 8px}
    #mes{float: right;margin-right: 20px;font-size: 20px;box-shadow:green;}
    a{list-style: none;text-decoration: none;color: #888888}
    a:hover{color: orangered;}
    .footer{margin-top: 60px;background-color: #333333;text-align: center;height: 50px}
    .f{width:300px;color: white;margin: 0 auto;padding-top: 6px}
</style>
<body>
<div class="wrap"><a href="http://jishuz.cn/blog" target="_blank">
    <div class="img"></div></a><button id="mes" onclick="openpanel()">点我留言</button>
    <?php
    $sql = "select * from reply";
    $res = mysql_query($sql);
    $mid = array();
    while($te = mysql_fetch_assoc($res)){
        $rp[$j]= $te;
        $j++;
    }
    for($s=0;$s<sizeof($rp);$s++){
        $mid[] = $rp[$s]['mid'];
    }
    for($i=0;$i<count($t);$i++){
        echo "<div class='message'>
        <div class='title'><h3>".$t[$i]['username']."</h3><a href='mailto:".$t[$i]['email']."'>E-Mail</a><a href='javascript:reply(".$t[$i]['id'].")'>我要回复</a></div>
        <div class='say'><div class='content'>".$t[$i]['content']."</div></div>";
           for($m=0;$m<sizeof($mid);$m++){
               if($mid[$m] == $t[$i]['id']){
                   echo "<div class='reply'>
                  <div class='title'><h3>".$rp[$m]['username']." (send to) ".$t[$i]['username']."</h3><a href='mailto:".$rp[$m]['email']."'>E-Mail</a></div>
                  <div class='say'><div class='content'>".$rp[$m]['content']."</div></div></div>";
               }
           }
        echo "</div>";
    }?>






    <div id="panel" style="display: none;position:fixed; left:50%; top:80%; width:500px; height:120px; margin-left:-300px; margin-top:-200px; border:1px solid #888; background-color:#edf; text-align:center">
        <form action="get.php" method="post" >
            <table border="0" width="400">
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
                    <td><input type="button" value="关闭窗口" onclick="closepanel()"/></td>
                </tr>
            </table>
        </form>
    </div>

</div>

<div class="footer">
    <div class="f">Copyright © 2016 Silver'guestbook- 湘ICP备15013373号 |  Theme By <a href="http://jishuz.cn">Silver</a></div>
</div>

<script>
    var panel = document.getElementById("panel");
    function openpanel(){
        panel.style.display="";
    }
    function closepanel(){
        panel.style.display="none";
    }
    function reply(i){
        location.href = "reply.php?id="+i;
    }
</script>
</body>
</html>