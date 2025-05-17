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
    // json file
    $jsonFile = "../data/article.json";
    // file get contents
    $jsonData = file_get_contents($jsonFile, true);
    // json decode
    $jsonDecode = json_decode($jsonData, JSON_PRETTY_PRINT);
    if(!is_array($jsonDecode)) {
        $jsonDecode = [];
    }
    // data count
    $dataCount = count($jsonDecode);
    if($dataCount == 0) {
        $articleId = 1;
    }
    else {
        $articleId = $dataCount + 1;
    }
    // new article data
    $newArticleData = array("id" => $articleId, "title" => $title, "date" => $date, "content" => $content);
    $jsonDecode[] = $newArticleData;
    // json encode
    $jsonEncode = json_encode($jsonDecode, JSON_PRETTY_PRINT);
    // file put contents
    file_put_contents($jsonFile, $jsonEncode);
    // redirect
    header("Location: /new");
    // response
    // session_start();
    $_SESSION["success"] = "Data is inserted";
    exit();
?>