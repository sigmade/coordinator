<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
 <a class="navbar-brand" href="../index.php">Система координатор</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

    <?php
    $url = $_SERVER["REQUEST_URI"];
    switch($_COOKIE['log']){
    case '':  ?>
    <li class="nav-item">
        <a class="nav-link" href="../auth.php">Вы не авторизованы</a>
    </li>
     <?php
    break;
    default :
    ?>

      <li class="nav-item">
        <a <?php if ($url == "/overalls/balance.php") {echo 'class="nav-link active"';} else {echo 'class="nav-link"';}?> href="../overalls/balance.php">Спецодежда</a>
      </li>
            <a <?php if ($url == "/employees/employees.php") {echo 'class="nav-link active"';} else {echo 'class="nav-link"';}?> href="../employees/employees.php">Сотрудники</a>
        </li>
      <li class="nav-item">
        <a <?php if ($url == "/employees/load.php") {echo 'class="nav-link active"';} else {echo 'class="nav-link"';}?> href="../employees/load.php">Загрузка документов</a>
      </li>
<?php
    break;
  }
  ?>

    </ul>
  </div>
</nav>
