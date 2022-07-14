<!DOCTYPE html>
<html>

<head>
    <title>SIGN UP</title>
    <meta charset="UTF-8">
    <!-- icon -->
    <link rel="Shortcut Icon" 
          type="image/x-icon" 
          href="assets/images/internet.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" 
          crossorigin="anonymous">
    <!-- custom css -->
    <link href="./assets/css/login.css?v=<?= time() ?>" rel="stylesheet">
</head>

<body>
    <nav class="image">
        <div class="container-fluid">
            <a class="image-text" href="index.php">
                <img src="assets/images/logo.png" 
                     class="align-text-center d-inline-block">
                智慧農業物聯網平台
            </a>
        </div>
    </nav>

    <div class="containet d-flex justify-content-center 
        align-items-center" style="min-height: 100vh">
        <form class="border shadow p-3 rounded bg-warning bg-gradient" action="php/check_signup.php" method="post" style="width: 450px;">

            <h4 class="text-center p-3">註冊</h4>

            <?php if (isset($_GET['error'])) { ?>
                </p>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="username" class="form-label">帳號</label>
                <input type="text" class="form-control" name="username" placeholder="請輸入帳號:" id="username" value="<?php echo (isset($_GET['username'])) ? $_GET['username'] : "" ?>">
            </div>

            <div class="mb-3">
                <label for="passowrd" class="form-label">密碼</label>
                <input type="password" name="password" placeholder="請輸入密碼:" class="form-control" id="passowrd" value="<?php echo (isset($_GET['passowrd'])) ? $_GET['passowrd'] : "" ?>">

            </div>

            <div class="mb-3">
                <label for="re_passowrd" class="form-label">再一次輸入密碼</label>
                <input type="password" name="re_password" placeholder="再一次輸入密碼:" class="form-control" id="passowrd" value="<?php echo (isset($_GET['re_passowrd'])) ? $_GET['re_passowrd'] : "" ?>">
            </div>

            <button type="submit" class="btn btn-primary">註冊</button>
            <!-- Register buttons -->
            <div class="text-center">
                <a href="login.php">已經有帳號了?</a>
            </div>
        </form>
    </div>

</body>

</html>