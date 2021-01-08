<?php
if ($_COOKIE['log'] == '') {
  header('Location:../auth.php');
  exit();
}
$website_title = 'Наличие спецодежды';
require '../blocks/head.php';
require '../libs/connect.php';


?>
<!DOCTYPE html>
<html lang="en">
<?php require '../blocks/header.php'; ?>
<body>


  <main class="container mt-4">
    <div class="row">
      <div class="col">
      </div>
      <div class="col-md-10 mb-3">
      <div class=" mb-3">
        <form class="form-inline" action="#" method="post">
          <div class="form-group mb-2">
          <label class=" mr-3"><h5><?=$website_title ?></h5></label>
          </div>
          <div class="form-group mx-sm-3 mb-2">
          <select class="form-control" name="act">
          <option value=""> Все объекты </option>
             <?php
            $sql = 'SELECT * FROM `warehouse`'; // выбор объекта-склада
             $result = mysqli_query($link, $sql);

                   while ($row = mysqli_fetch_array($result))
                     {
                      echo " <option value='{$row['name']}'>{$row['name']}</option>";
                       }
                     echo mysqli_error($link);
            ?>
          </select>
          </div>
          <button type="submit" class="ml-2 btn btn-primary mb-2">Применить</button>
          </form>
         </div>

        <?php

        $local = @$_POST['act']; // выбранный объект

        $sql_date = "SELECT `data`
        FROM `roba`
        WHERE `local`= '$local'
        ORDER BY `data` ASC LIMIT 1
        "; //определение последней даты

        $result_date = mysqli_query($link, $sql_date);
        $obj = "все объекты";

        if ($local == null) {

            $sql = "SELECT `type`,
            SUM(`quality`) AS `total`
            FROM `roba`
            GROUP BY  `type`";
            $obj = "все объекты";
            $sql_date = "SELECT `data`
            FROM `roba`
            ORDER BY `data` DESC LIMIT 1";
            $result_date = mysqli_query($link, $sql_date);

        } else {

            $sql = "SELECT `type`,
            SUM(`quality`) AS `total`
            FROM `roba` WHERE `local`= '$local'
            GROUP BY  `type`";
            $obj = $local;
        }

        echo "Объект: ".$obj."<br>";

        while ($row = mysqli_fetch_array($result_date)) {

          echo "<div class='mt-1 mb-3'>Последняя запись {$row['data']} </div>";

        }

        $result = mysqli_query($link, $sql);
        echo "<table class='table table-striped print'>";
        while ($row = mysqli_fetch_array($result)){

            echo "<tr><td>{$row['type']}</td>
                      <td>{$row['size']}</td>
                      <td>{$row['total']}</td></tr>";
        }
        echo mysqli_error($link);
        echo "</table>";

        ?>
      </div>
      <div class="col">
      </div>
    </div>
  </main>

  <?php require '../blocks/footer.php'; ?>
</body>
</html>
