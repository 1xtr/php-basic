<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=mb_strtoupper($template)?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<ul class="nav">
    <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
    <li class="nav-item"><a href="/catalog/" class="nav-link">Каталог</a></li>
    <li class="nav-item"><a href="/profile/" class="nav-link">Профиль</a></li>
    <?php if ($_SESSION['is_admin']) :  ?>
        <li class="nav-item"><a href="/dev/" class="nav-link">Dev</a></li>
    <?php endif; ?>
    <li class="nav-item"><a href="/auth/index.php?action=logout" class="nav-link">Logout</a></li>
</ul>
<?=$content?>
</body>
</html>