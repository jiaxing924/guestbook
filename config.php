<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/25
 * Time: 15:14
 */
error_reporting(0);
$conn = @mysql_connect("localhost","root","123456") or die("裤子没穿上!");
@mysql_select_db("zuoye")or die("裤子没找到");
mysql_query("set names 'UTF8'");
