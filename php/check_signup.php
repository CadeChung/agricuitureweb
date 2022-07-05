<?php
session_start();
include "../db_conn.php";

if (isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['re_password'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $userneme = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $re_password = test_input($_POST['re_password']);

    //$user_data = 'username'. $userneme. '&name='. $name;
    //echo $user_data;

    if (empty ($userneme)){
        header("Location: ../signup.php?error=帳號不可為空白&$userneme");
        exit;
    
    }else if (empty ($password)){
        header("Location: ../signup.php?error=密碼不可為空白&$userneme");
        exit;
    
    }else if (empty ($re_password)){
        header("Location: ../signup.php?error=重複密碼不可為空白&$userneme");
        exit;
    
    }else if ($password !== $re_password){
        header("Location: ../signup.php?error=密碼與重複密碼不符合&$userneme");
        exit;
    
    }else {
        
    //Hashing the password
        $password = md5($password);
        $sql = "INSERT INTO users(username, password)
    	        VALUES(?, ?)";
        $stmt = $conn->prepare($sql);
    	$stmt->execute([$userneme, $password]);
        header("Location: ../login.php?success=完成註冊!!!");
	    exit;
     }

} else {
    header("Location: ../signup.php");
}
