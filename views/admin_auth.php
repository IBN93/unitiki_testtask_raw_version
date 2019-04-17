<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Authorization page</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Войти в кабинет администратора</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-10 col-sm-6 col-md-4">
                <form action="../controllers/auth.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Логин:</label>
                        <input type="login" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите логин">
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputPassword1">Пароль:</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Введите пароль">
                    </div>
                    <?php echo isset($error_text) ? $error_text : '';?>
                    <div class="row justify-content-center"><button type="submit" class="btn btn-primary">Войти</button></div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>