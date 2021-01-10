<?php
if ($_COOKIE['log'] == '') {
  header('Location:../auth.php');
  exit();
}
$website_title = 'Загрузка документов';
require '../blocks/head.php';
require '../libs/connect.php';
require '../libs/functions.php';
error_reporting(0);



?>
<!DOCTYPE html>
<html lang="en">
<?php require '../blocks/header.php'; ?>
<body>
  <main class="container mt-4">
    <div class="row">
    <div class="col">
      </div>
      <div class="col-md-6 mb-3">

        <h5 class=" mb-3"><?= $website_title; ?></h5>
        <form method="post" enctype="multipart/form-data" action="../models/employees/load.php">
<div class="form-group">
        <label>Табельный номер сотрудника</label>
        <input type="text" class="form-control" name="dir" placeholder="Пример: 1052">
</div>
<table class='table'>
<tr>
 <td><label>Паспорт</label><input type="hidden" name="pasport" value="pasport" ></td>
 <td><input type="file" name="file" class="form-control-file"></td>
</tr>
<tr>
 <td><label>Адрес регистрации</label><input type="hidden" name="address" value="address" ></td>
 <td><input type="file" name="file3" class="form-control-file"></td>
</tr>
<tr>
 <td><label>СНИЛС</label><input type="hidden" name="snils" value="snils"></td>
 <td><input type="file" name="file2" class="form-control-file"></td>
</tr>
<tr>
 <td><label>ИНН</label><input type="hidden" name="inn" value="inn"></td>
 <td><input type="file" name="file4" class="form-control-file"></td>
</tr>
<tr>
 <td><label>Прочее</label><input type="hidden" name="other" value="other"></td>
 <td><input type="file" name="file5" class="form-control-file"></td>
</tr>
</table>

<button type="submit" class="btn btn-primary">Отправить</button>
</form>
    
      </div>

<div class="col">
      </div>
    </div>

  </main>

  <?php require '../blocks/footer.php'; ?>

</body>
</html>
