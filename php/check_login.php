<?php
session_start();
include "../db/db_conn.php";

if (isset($_POST['username']) &&
    isset($_POST['password'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $userneme = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty ($userneme)){
        header("Location: ../login.php?error=帳號不可為空白");
    }else if (empty ($password)){
        header("Location: ../login.php?error=密碼不可為空白");
    }else {
        
        // Hashing the password
        $password = md5($password);
        
        $sql = "SELECT * FROM users WHERE username='$userneme'
                AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1){
            //the user name must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password){
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../homepage.php");
            } else {
                header("Location: ../login.php?error=不正確的帳號密碼，請重新輸入!!");
            }
        }  else {
            header("Location: ../login.php?error=不正確的帳號密碼，請重新輸入!!");
        }
    }

} else {
    header("Location: ../login.php");
}