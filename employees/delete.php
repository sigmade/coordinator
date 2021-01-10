<?php
if ($_COOKIE['log'] == '') {
    header('Location:../auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<head>
    <?php
    $website_title = 'Личная карточка сотрудника';
    require '../blocks/head.php';
    include_once ('../libs/connect.php');

    ?>
</head>
<body>
<?php require '../blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM `staff` WHERE `unk`=$id";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            echo mysqli_error($link);
            ?>

            <h5>Вы действительно хотите удалить Сотрудника с ID № <?=$id ?> ?</h5>
            <form method="post" action="../models/employees/delete.php">
                <input type="hidden" name='id' value='<?=$id ?>'>
                <p><button type="submit" class="btn btn btn-danger">Удалить</button></p>
                <p><a href='../employees/employees.php'><button type='button' class='btn btn-warning'>Отменить</button></a></p>
            </form>
        </div>
    </div>
</main>
<?php




?>
<?php require '../blocks/footer.php'; ?>
</body>
</html>

