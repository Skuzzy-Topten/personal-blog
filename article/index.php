<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Article</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="view-btn-gp">
                <a href="../" class="view-back">
                    Back
                </a>
            </div>
            <div class="view-content">
                <?php
                    $url = $_SERVER["REQUEST_URI"];
                    $explode = explode("/", $url);
                    $urlId = $explode[2];
                    // json file
                    $jsonFile = "../data/article.json";
                    // file get contents
                    $jsonData = file_get_contents($jsonFile, true);
                    // json decode
                    $jsonDecode = json_decode($jsonData, JSON_PRETTY_PRINT);
                ?>
                <h1 class="title">
                    <?php echo $jsonDecode[$urlId]["title"]; ?>
                </h1>
                <p class="date">
                    <?php echo $jsonDecode[$urlId]["date"]; ?>
                </p>
                <p class="content">
                    <?php echo $jsonDecode[$urlId]["content"]; ?>
                </p>
            </div>
        </div>
    </main>
</body>
</html>