<?php
    session_start();
    if(!isset($_SESSION["login_success"])) {
        header("Location: ../login");
    }
    $url = $_SERVER["REQUEST_URI"];
    $explode = explode("/", $url);
    $urlId = $explode[2];
    
    // json file
    $jsonFile = "../data/article.json";
    // file get contents
    $jsonData = file_get_contents($jsonFile, true);
    // json decode
    $jsonDecode = json_decode($jsonData, JSON_PRETTY_PRINT);
    // delete the data
    unset($jsonDecode[$urlId]);
    // json encode
    $jsonEncode = json_encode($jsonDecode, JSON_PRETTY_PRINT);
    // file put contents
    file_put_contents($jsonFile, $jsonEncode);
    // redirect
    header("Location: ../dashboard");
    // response
    // session_start();
    $_SESSION["data_delete"] = "Data is deleted";
    exit();
?>