<?php
if ($_COOKIE['log'] == '') {
    header('Location:/auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    $website_title = 'Сотрудники';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');
    ?>
</head>
<body>
<?php require '../blocks/header.php'; ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Список</li>
                    <li class="breadcrumb-item"><a href="/ins_staff.php">Добавить</a></li>
                    <li class="breadcrumb-item"><a href="#">Изменить</a></li>
                </ol>
            </nav>
            <p><form class="form-inline" action="./search_employee.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск по ФИО, УНК" name="query" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
            </form></p>
            <?php
            $query = $_POST['query'];
            $query = trim($query);

            $sql = "SELECT * FROM `staff`
              WHERE `name` LIKE '%$query%'
              OR `surname` LIKE '%$query%'
              OR `unk` LIKE '%$query%'";
            $result = mysqli_query($link, $sql);
            echo '<table class="table table-striped print">
            <thead>
            <th>УНК</th>
            <th>ИМЯ</th>
            </thead>';
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr><td>{$row['unk']}</td>
                          <td>{$row['surname']}&nbsp;{$row['name']}&nbsp;{$row['patronymic']}<br>
                          <a href='worker.php?unk={$row['unk']}' target='_blank'>
                          <button type='button' class='btn btn-warning'>Подробнее</button>
                          </a></td></tr>";
            }
            echo '</table>';
            echo mysqli_error($link);
            echo "Результаты по запросу: $query";
            ?>

        </div>

    </div>

</main>

<?php require '../blocks/footer.php'; ?>
</body>
</html>

