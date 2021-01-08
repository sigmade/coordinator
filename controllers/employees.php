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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<?php require '../blocks/header.php'; ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <nav aria-label="breadcrumb">
                    <a class="btn btn-outline-primary mr-2 mb-2" href="./create-employee.php">Добавить</a>
            </nav>
            <p>
            <form class="form-inline" action="employees.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск по ФИО, УНК" name="query" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
            </form>
            </p>
            <?php
            $query = $_POST['query'];
            $query = trim($query);

            $sql = "SELECT * FROM `staff`
              WHERE `name` LIKE '%$query%'
              OR `surname` LIKE '%$query%'
              OR `unk` LIKE '%$query%'";
            $result = mysqli_query($link, $sql);
            echo '<table class="table">
            <thead>
            <th>УНК</th>
            <th>ИМЯ</th>
            </thead>';
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr><td>{$row['unk']}</td>
                          <td><a  href='./employee-card.php?unk={$row['unk']}' class='link-info'>
                          {$row['surname']}&nbsp;{$row['name']}&nbsp;{$row['patronymic']}
                          </a></td>
                      </tr>";
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

