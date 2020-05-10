<?php
  error_reporting(0);
require '../libs/connect.php';
  $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
  $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

  $error = '';
  if(strlen($login) <= 3)
    $error = 'Введите логин';
  else if(strlen($pass) <= 3)
    $error = 'Введите пароль';

  if($error != '') {
    echo $error;
    exit();
  }


  $sql = "SELECT `id`, `group`  FROM `user` WHERE `login` = '{$login}' && `pass` = $pass ";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result);
  $group = $row['group'];

  if($row['id'] == 0)
      echo 'Такого пользователя не существует';
    else {
      setcookie('log', $login, time() + 3600 * 24 * 30, "/");
      setcookie('group', $group, time() + 3600 * 24 * 30, "/"); // тогда чтобы выйти удалить в exit.php
      setcookie('lastVisit', time(), 0x7FFFFFFF);
      echo 'Готово';
    }

?>
