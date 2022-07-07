<?php
session_start();
include "db/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>智慧農業物聯網平台</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/homepage.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand w3-xlarge w3-text-orange" href="homepage.php">智慧農業物聯網平台</a>
        </nav>

        <?php if ($_SESSION['username'] == 'admin') { ?>
            <!-- For Admin -->
            <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="custom-menu">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        </button>
                    </div>
                    <div class="img bg-wrap text-center py-4" style="background-image: url(assets/images/bg_1.jpg);">
                        <div class="user-logo">
                            <div class="img" style="background-image: url(assets/images/users.png);"></div>
                            <h3>管理員</h3>
                        </div>
                    </div>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="homepage.php"><span class="fa fa-home mr-3"></span> 首頁</a>
                        </li>
                        <li>
                            <a href="http://127.0.0.1:1880/ui"><span class="fa fa-eye mr-3"></span> 網頁儀錶板</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-database mr-3"></span> 歷史數據</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-cog mr-3"></span> 設定</a>
                        </li>
                        <li>
                            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> 登出帳號</a>
                        </li>
                    </ul>
                </nav>
                <!-- Page Content  -->
                <div id="content" class="p-4 p-md-5 pt-5">
                    <header class="w3-container w3-theme w3-padding-64 w3-center">
                        <h1 class="w3-xxxlarge w3-padding-16">智慧農業物聯網平台</h1>
                    </header>
                    <?php include 'php/members.php';
                    if (mysqli_num_rows($res) > 0) { ?>
                        <h1 class="mb-4">使用者帳號管理</h1>
                        <table class="table" style="width: 32rem;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">已註冊帳號</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($rows = mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $rows['username'] ?></td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="custom-menu">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        </button>
                    </div>
                    <div class="img bg-wrap text-center py-4" style="background-image: url(assets/images/bg_1.jpg);">
                        <div class="user-logo">
                            <div class="img" style="background-image: url(assets/images/users.png);"></div>
                            <h3>使用者</h3>
                        </div>
                    </div>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                            <a href="homepage.php"><span class="fa fa-home mr-3"></span> 首頁</a>
                        </li>
                        <li>
                            <a href="http://127.0.0.1:1880/ui"><span class="fa fa-eye mr-3"></span> 網頁儀錶板</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-database mr-3"></span> 歷史數據</a>
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-cog mr-3"></span> 設定</a>
                        </li>
                        <li>
                            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> 登出帳號</a>
                        </li>
                    </ul>
                </nav>
                <!-- Page Content  -->
                <div id="content" class="w3-container w3-margin-bottom" style="background-image: url(assets/images/bg_2.png);
                                         background-size: contain">
                    <iframe align="right" src="https://www.google.com/maps/d/u/0/embed?mid=1EPqt-noF3wpsN97MJy2_s8-dFSXfaE8&ehbc=2E312F" width="840" height="480">
                    </iframe>
                    <ul class="w3-ul w3-card" style="width:50%">
                        <a class="jumbotron h1 w3-left bg-dark w3-text-orange">花卉研究室溫室場域導覽
                            <li class="h2 w3-text-orange">經度：120.52674</li>
                            <li class="h2 w3-text-orange">緯度：22.71037</li>
                            <li class="h2 w3-text-orange">地址：屏東縣長治鄉德和路2-6號</li>
                        </a>
                    </ul>
                </div>
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/popper.js"></script>
                <script src="assets/js/bootstrap.min.js"></script>
                <script src="assets/js/main.js"></script>
            </div>
            <footer class="navbar navbar-expand-md bg-white navbar-white">
                <h5>資訊欄</h5>
                <p>Footer information goes here</p>
            </footer>
        <?php } ?>
    </body>

    </html>

<?php } else {
    header("Location: login.php");
} ?>