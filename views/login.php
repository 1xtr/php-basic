<div class="d-flex mw-100 justify-content-center align-items-center">
    <form action="" method="post">
        <div class="form-group">
            <label for="login">Имя пользователя</label>
            <input type="text" class="form-control" aria-describedby="loginHelp" name="login">
            <small id="loginHelp" class="form-text text-muted">Содержит строчные и заглавные букры, цифры, знак подчеркивания</small>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="rememberMe">
            <label class="form-check-label" for="neverlogout">Запомнить меня</label>
        </div>
        <button type="submit" class="btn btn-primary">Вход</button>
        <a class="btn btn-primary" href="/auth/reg.php" role="button">Registration</a>
    </form>
</div>