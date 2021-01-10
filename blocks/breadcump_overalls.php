 <?php  $url = $_SERVER["REQUEST_URI"];?>
 
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li <?php if ($url == "/overalls/balance.php") {echo 'class="breadcrumb-item active" aria-current="page">Остатки';}
else {echo 'class="breadcrumb-item"><a href="/overalls/balance.php">Остатки</a>';}?></li>
<li <?php if ($url == "/overalls/arrival.php") {echo 'class="breadcrumb-item active" aria-current="page">Поступление';}
else {echo 'class="breadcrumb-item"><a href="/overalls/arrival.php">Поступление</a>';}?></li>
<li <?php if ($url == "/overalls/extradition.php") {echo 'class="breadcrumb-item active" aria-current="page">Выдача';}
else {echo 'class="breadcrumb-item"><a href="/overalls/extradition.php">Выдача</a>';}?></li>
</ol>
</nav>


