<?php
session_start();
include "./db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>使用者首頁</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- custom css -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
        
    </head>

    <body>
    <div class = "body" ></div>
        <!-- Sidebar -->
        <div class="w3-flat-midnight-blue w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
            <a class="thick w3-padding w3-xlarge w3-text-white w3-bar-block w3-bar-item w3-button w3-large w3-hover-black" 
                    onclick="w3_close()">關閉 &times;</a>

            <a href="#" class="thick w3-padding w3-xlarge w3-text-white w3-bar-item w3-hover-red">
                <img src="https://cdn-icons-png.flaticon.com/32/1057/1057118.png">
                使用者首頁
            </a>
            <a href="#" class="thick w3-padding w3-xlarge w3-text-white w3-bar-item w3-hover-green">
                <img src="https://cdn-icons-png.flaticon.com/32/3408/3408591.png">
                即時數據
            </a>
            <a href="#" class="thick w3-padding w3-xlarge w3-text-white w3-bar-item w3-hover-orange">
                <img src="https://cdn-icons-png.flaticon.com/32/921/921591.png">
                歷史數據
            </a>
            <link href="assets/css/sidebar.css" rel="stylesheet">
            <!-- script -->
            <script src="assets/js/sidebar.js"></script>
        </div>

        <div id="main">
            <div class="w3-teal">
            <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container w3-xlarge w3-teal">
                    <h1>
                        <img src="assets/images/logo.png"> 
                        智慧農業平台
                    </h1>
                </div>
            </div>
        </div>

        <div class="containet d-flex justify-content-center 
        align-items-center" style="min-height: 100vh">
            <?php if ($_SESSION['username'] == 'admin') { ?>
                <!-- For Admin -->
                <div class="card" style="width: 18rem;">
                    <img src="assets/images/admin.png" class="card-img-top" alt="admin image">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <?= $_SESSION['username'] ?>
                        </h5>
                        <a href="logout.php" class="btn btn-dark">
                            Logout</a>
                    </div>
                </div>
                <div class="p-3">
                    <?php include 'php/members.php';
                    if (mysqli_num_rows($res) > 0) { ?>

                        <h1 class="display-4 fs-1">使用者帳號列表</h1>
                        <table class="table" style="width: 32rem;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">帳號</th>
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
            <?php } else { ?>
                <!-- FORM USER -->
                <div class="card" style="width: 18rem;">
                    <img src="assets/images/users.png" class="card-img-top" alt="user image">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <?= $_SESSION['username'] ?>
                        </h5>
                        <a href="logout.php" class="btn btn-dark">
                            Logout</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </body>

    </html>
<?php } else {
    header("Location: login.php");
} ?>