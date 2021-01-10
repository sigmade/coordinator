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
            <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM `staff` WHERE `unk`=$id";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            echo mysqli_error($link);
            ?>
            <form action="../models/employees/edit.php" method="post" class="form-group">
                <table>
                    <tr><td widht="75">УНК</td><td><input type="text" class="form-control" name="unk" value='<?=$row['unk']?>'></td></tr>
                    <tr><td widht="75">Фамилия</td><td><input type="text" class="form-control" name="surname" value='<?=$row['surname']?>'></td></tr>
                    <tr><td widht="75">Имя</td><td><input type="text" class="form-control" name="name" value='<?=$row['name']?>'></td></tr>
                    <tr><td widht="75">Отчество</td><td><input type="text" class="form-control" name="patronymic" value='<?=$row['patronymic']?>'></td></tr>
                    <tr>
                        <td widht="75">Пол</td>
                        <td><select class="form-control" name="gender" value='<?=$row['gender']?>'>
                                <option value="МУЖ">МУЖ</option>
                                <option value="ЖЕН">ЖЕН</option>
                            </select></td>
                    </tr>
                    <tr><td widht="75">Дата рождения</td><td><input type="text" class="form-control" name="date_of_birth" value='<?=$row['date_of_birth']?>'></td></tr>
                    <tr><td widht="75">Номер паспорта</td><td><input type="text" class="form-control" name="pasp_num" value='<?=$row['pasp_num']?>'></td></tr>
                    <tr><td widht="75">Адрес</td><td><input type="text" class="form-control" name="address" value='<?=$row['address']?>'></td></tr>
                    <tr><td widht="75">ИНН</td><td><input type="text" class="form-control" name="inn" value='<?=$row['inn']?>'></td></tr>
                    <tr><td widht="75">СНИЛС</td><td><input type="text" class="form-control" name="snils" value='<?=$row['snils']?>'></td></tr>
                    <tr><td widht="75">Моб. телефон</td><td><input type="text" class="form-control" name="phone" value='<?=$row['phone']?>'></td></tr>
                    <tr><td widht="75">E-mail</td><td><input type="text" class="form-control" name="email" value='<?=$row['email']?>'></td></tr>
                </table>
                <button type='button' class='btn btn-warning'data-toggle='modal' data-target='#staticBackdrop'>Изменить</button>

                <a class="btn btn-primary m-2" href="./employees.php">Отменить</a>
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Предупреждение</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Вы действительно хотите изменить?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

</main>

<?php require '../blocks/footer.php'; ?>
</body>
</html>
