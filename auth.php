<!DOCTYPE html>
<html lang="ru">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
  <?php
    error_reporting(0);
    $website_title = 'Личный кабинет';
    require 'blocks/head.php';
    require 'libs/connect.php';
  ?>
</head>
<body>
  <?php require 'blocks/header.php'; ?>
  
  <main>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
            </div>
                <div class="col-md-6">
                    <?php        
                                                           
                                if($_COOKIE['log'] == ''){
                                ?>
                                <h4>Форма авторизации</h4>
                                <form action="" method="post">
                                  <label for="login">Логин</label>
                                  <input type="text" name="login" id="login" class="form-control mb-2">

                                  <label for="pass">Пароль</label>
                                

                                        <input
                                          id="password"
                                          name="pass"
                                          class="form-control"
                                          type="password"
                                          maxlength="10"
                                          placeholder="Введите пароль">


                                  <div class="mt-2" id="errorBlock"></div>

                                  <button type="button" id="auth_user" class="btn btn-success mt-3">
                                    Войти
                                  </button>
                                </form>
                                <?php }
                                  elseif  ($_COOKIE['log'] !== '') {
                                $lastVisit = date("d-m-Y", $_COOKIE['lastVisit']);
                                $user = ($_COOKIE['log']);
                                $sql = "SELECT * FROM `user` WHERE `login`= '{$user}'";
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_array($result);
                                echo "<h5>Личный кабинет</h5>
                                      <p><img src='{$row['avatar']}' height='255'></p>
                                      <table class='table print'>
                                      <tr><td>Имя</td><td>{$row['name']}</td></tr>
                                      <tr><td>E-mail</td><td>{$row['email']}</td></tr>
                                      <tr><td>Логин</td><td>{$user}</td></tr>
                                      </table><br> ";


                               echo mysqli_error($link);

                                ?>


                                <button class="btn btn-danger" id="exit_btn">Выйти</button>

                                <?php
                              }

                                    ?>
                </div>
            <div class="col">
            </div>
        </div>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    $('#exit_btn').click(function () {
      $.ajax({
        url: 'ajax/exit.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function(data) {
          document.location.reload(true);
        }
      });
    });

    $('#auth_user').click(function () {
      var login = $('#login').val();
      var pass = $('#password').val();

      $.ajax({
        url: 'ajax/auth.php',
        type: 'POST',
        cache: false,
        data: {'login' : login, 'pass' : pass},
        dataType: 'html',
        success: function(data) {
          if(data == 'Готово') {
            $('#auth_user').text('Готово');
            $('#errorBlock').hide();
            document.location.reload(true);
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  <script>
    $(function() {
    $('#password').password()
    })
</script>
  
</body>
</html>
