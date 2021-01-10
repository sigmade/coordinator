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
    $website_title = 'Авторизация на сайте';
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
                    <li class="breadcrumb-item"><a href="./employees.php">Список</a></li>
            </ol>
            </nav>
            <form action="../models/employees/create.php" method="post" class="form-group">
                <table>
                    <tr><td widht="75">УНК</td><td><input type="text" class="form-control" name="unk"></td></tr>
                    <tr><td widht="75">Фамилия</td><td><input type="text" class="form-control" name="surname"></td></tr>
                    <tr><td widht="75">Имя</td><td><input type="text" class="form-control" name="name"></td></tr>
                    <tr><td widht="75">Отчество</td><td><input type="text" class="form-control" name="patronymic"></td></tr>
                    <tr>
                        <td widht="75">Пол</td>
                        <td><select class="form-control" name="gender">
                                <option value="МУЖ">МУЖ</option>
                                <option value="ЖЕН">ЖЕН</option>
                            </select></td>
                    </tr>
                    <tr><td widht="75">Дата рождения</td><td><input type="text" class="form-control" name="date_of_birth"></td></tr>
                    <tr><td widht="75">Номер паспорта</td><td><input type="text" class="form-control" name="pasp_num"></td></tr>
                    <tr><td widht="75">Адрес</td><td><input type="text" class="form-control" name="address"></td></tr>
                    <tr><td widht="75">ИНН</td><td><input type="text" class="form-control" name="inn"></td></tr>
                    <tr><td widht="75">СНИЛС</td><td><input type="text" class="form-control" name="snils"></td></tr>
                    <tr><td widht="75">Моб. телефон</td><td><input type="text" class="form-control" name="phone"></td></tr>
                    <tr><td widht="75">E-mail</td><td><input type="text" class="form-control" name="email"></td></tr>
                </table>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>

    </div>

</main>

<?php require '../blocks/footer.php'; ?>
</body>
</html>
