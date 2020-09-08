<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$pageData['title']; ?></title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header></header>

<body>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" method="post">
                        <h3 class="text-center text-info">Вход в личный кабинет</h3>
                        <?php if(!empty($pageData['error'])) :?>
                            <p><?php echo $pageData['error']; ?></p>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="username" class="text-info">Имя пользователя:</label><br>
                            <input type="text" name="login" id="login" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Пароль:</label><br>
                            <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span>Запомнить меня</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <div class="btnContainer">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Вход">
                            </div>
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="#" class="text-info">Регистрация</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

    <footer>

    </footer>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/angular.min.js"></script>
    <script src="/assets/js/script.js"></script>

</body>
</html>