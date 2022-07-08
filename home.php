<?php
session_start();
include "db/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
<!DOCTYPE html>
<html lang="en">
    <?php include ("include/user/head.php");?>
    <body>
        <?php if ($_SESSION['username'] == 'admin') { ?>
            <?php include ("include/admin/nav.php");?>
            <?php include ("include/admin/section.php");?>
        
        <?php } else { ?>
            <?php include ("include/user/nav.php");?>
            <?php include ("include/user/section.php");?>
        <?php } ?>

        <script src="assets/js/script.js"></script>
    </body>
<html>
<?php } else {
    header("Location: login.php");
} ?>