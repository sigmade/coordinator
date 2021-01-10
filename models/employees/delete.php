<?php
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();
include_once ('../../libs/connect.php');
header('Location: ../../employees/employees.php');


?>
<?php
$id = $_POST['id'];


$query = "
DELETE FROM `staff`
WHERE `unk` = '$id'";

echo mysqli_error($link);
if (mysqli_query($link, $query)) {
    echo 'Добавлено';
    echo mysqli_error($link);

} else {
    echo mysqli_error($link);
    echo 'not Ok';
}

?>

