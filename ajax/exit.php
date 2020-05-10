<?php
  setcookie('log', $login, time() - 3600 * 24 * 30, "/");
  setcookie('group', $group, time() - 3600 * 24 * 30, "/");
  echo true;
?>
