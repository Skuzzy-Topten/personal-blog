<?php
    session_start();
    if(!isset($_SESSION["login_success"])) {
        header("Location: ../login");
    }
    // title
    $title = $_POST["title"];
    // date
    $date = $_POST["date"];
    // content
    $content = $_POST["content"];
    // id
    $urlId = $_POST["hidden"];
    // json file
    $jsonFile = "../data/article.json";
    // file get contents
    $jsonData = file_get_contents($jsonFile, true);
    // json decode
    $jsonDecode = json_decode($jsonData, JSON_PRETTY_PRINT);
    // update title
    $jsonDecode[$urlId]["title"] = $title;
    // update date
    $jsonDecode[$urlId]["date"] = $date;
    // update content
    $jsonDecode[$urlId]["content"] = $content;
    // json encode
    $jsonEncode = json_encode($jsonDecode, JSON_PRETTY_PRINT);
    // file put contents
    file_put_contents($jsonFile, $jsonEncode);
    // redirect
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    // response
    // session_start();
    $_SESSION['data_update'] = "Data is updated";
?>