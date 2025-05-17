<?php
    // username
    $username = $_POST["username"];
    // password
    $password = $_POST["password"];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    // json file
    $jsonFile = "../data/admin.json";
    // get contents
    $jsonData = file_get_contents($jsonFile);
    // json decode
    $jsonDecode = json_decode($jsonData, JSON_PRETTY_PRINT);
    // password verify
    $passwordVerify = password_verify($password, $jsonDecode["password"]);
    if($username == $jsonDecode["username"] && $passwordVerify == true) {
        session_start();
        // redirect
        header("Location: ../dashboard");
        $_SESSION["login_success"] = "Login Success";
        exit();
    } else {
        // redirect
        header("Location: /login");
        // response
        if($username != $jsonDecode["username"]) {
            $_SESSION["username_err"] = "Username is wrong";
        }
        if($passwordVerify == false) {
            $_SESSION["password_err"] = "Password is wrong";
        }
        exit();
    }
?>