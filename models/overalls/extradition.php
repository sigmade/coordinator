<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once('../libs/connect.php');

mysqli_set_charset($link, "utf8");

header('Location: /controllers/extr.php');


$date = @$_POST['date'];
$type = @$_POST['type'];
$quality = @$_POST['quality'];
$quality = -$quality;
$source = @$_POST['source'];
$local = @$_POST['local'];
$user = @$_POST['user'];
$query = "
INSERT INTO `overalls` SET
`date` = '$date',
`type` = '$type',
`quality` = '$quality',
`source` = '$source',
`user` = '$user',
`local` = '$local'";



if (mysqli_query($link, $query)) {
echo 'Добавлено';

} else {
echo 'not Ok';
}



?>
