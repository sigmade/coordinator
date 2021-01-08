<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once ('../libs/connect.php');

mysqli_set_charset($link, "utf8");

header('Location: /controllers/insert.php');

?>
<?php
$date = @$_POST['date'];
$type = @$_POST['type'];
$quality = @$_POST['quality'];
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
echo mysqli_error($link);
    $date=date('d.m.Y h:i:s');
    $file=fopen("../logs/roba.csv", "a+t");
    fwrite($file, "$date; $type; $quality; $source; $local\n");
    fclose($file);

} else {
echo 'not Ok';
echo mysqli_error($link);
}



?>
