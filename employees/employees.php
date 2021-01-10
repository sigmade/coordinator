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
    include_once('../libs/connect.php');
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
                    <a class="btn btn-outline-primary mr-2 mb-2" href="create.php">Добавить</a>
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
            <th></th>
            <th></th>
            </thead>';
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr><td>{$row['unk']}</td>
                          <td><a  href='./employee-card.php?unk={$row['unk']}' class='link-info'>
                          {$row['surname']}&nbsp;{$row['name']}&nbsp;{$row['patronymic']}
                          </a></td>
                          <td>
                          <a href='./edit.php?id={$row['unk']}'>
                          <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                          <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>
                          <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z\"/>
                        </svg>
                          </a>
                          </td>
                          <td><a href='delete.php?id={$row['unk']}'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                              <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>
                              <path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>
                            </svg>
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

