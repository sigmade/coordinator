<?php
if ($_COOKIE['log'] == '') {
    header('Location:/auth.php');
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
            $unk = $_GET['unk'];

            $sql = "SELECT * FROM `staff` WHERE `unk`=$unk";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);

            echo "<h5>Личная карточка работника</h5>
                  <table class='table print'>
                  <tr><td>УНК</td><td>{$row['unk']}</td></tr>
                  <tr><td>Фамилия</td><td>{$row['surname']}</td></tr>
                  <tr><td>Имя</td><td>{$row['name']}</td></tr>
                  <tr><td>Отчество</td><td>{$row['patronymic']}</td></tr>
                  <tr><td>Пол</td><td>{$row['gender']}</td></tr>
                  <tr><td>Дата рождения</td><td>{$row['date_of_birth']}</td></tr>
                  <tr><td>Номер паспорта</td><td>{$row['pasp_num']}</td></tr>
                  <tr><td>Адрес регистрации</td><td>{$row['address']}</td></tr>
                  <tr><td>ИНН</td><td>{$row['inn']}</td></tr>
                  <tr><td>Снилс</td><td>{$row['snils']}</td></tr>
                  <tr><td>Моб. телефон</td><td><a href='tel:{$row['phone']}' target='_blank'>{$row['phone']}</a></td></tr>
                  <tr><td>E-mail</td><td><a href='mailto:{$row['email']}?subject=От компании ММБ' target='_blank'>{$row['email']}</a></td></tr>
                  </table><br>

                  ";
            echo mysqli_error($link);
            ?>
        </div>
    </div>
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <div class="modal-title">Просмотр изображения</div>
                </div>
                <div class="modal-body">
                    <img class="img-responsive center-block" src="" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a href="#" class="thumbnail">
                    <img src="<?= $row['pasp_dir'] ?>" height='255' alt="ПАСПОРТ">
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a href="#" class="thumbnail">
                    <img src="<?= $row['snils_dir'] ?>" height='255' alt="СНИЛС">
                </a>
            </div>

        </div>
        <input class='btn btn-outline-primary mt-3 mb-3' onclick='javascript:window.print()' class='btn btn-succes m-2' value='Распечатать'><br>
        <a  href='./employees.php'>Назад к списку</a>
    </div>

</main>

<?php require '../blocks/footer.php'; ?>

<script>
    // После загрузки DOM-дерева (страницы)
    $(function() {
        //при нажатии на ссылку, содержащую Thumbnail
        $('a.thumbnail').click(function(e) {
            //отменить стандартное действие браузера
            e.preventDefault();
            //присвоить атрибуту scr элемента img модального окна
            //значение атрибута scr изображения, которое обёрнуто
            //вокруг элемента a, на который нажал пользователь
            $('#image-modal .modal-body img').attr('src', $(this).find('img').attr('src'));
            //открыть модальное окно
            $("#image-modal").modal('show');
        });
        //при нажатию на изображение внутри модального окна
        //закрыть его
        $('#image-modal .modal-body img').on('click', function() {
            $("#image-modal").modal('hide')
        });
    });
</script>
</body>
</html>
