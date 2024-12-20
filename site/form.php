<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>
<body class="body">
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1>Sign up</h1>
                <form action="check.php" method="post">
        <input type="text" class="form-control" name="login" id="login" placeholder="Login"><br>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password"><br>
        <button class="btn btn-success" type="submit">Зареєструватися</button>
                </form>
            </div>
            <div class="col">
                <h1>Log in</h1>
                <form action="auth.php" method="post">
        <input type="text" class="form-control" name="login" id="login" placeholder="Login"><br>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password"><br>
        <button class="btn btn-success" type="submit">Увійти</button>
                </form>
            </div>
    
        </div>
    </div>
</body>
</html>