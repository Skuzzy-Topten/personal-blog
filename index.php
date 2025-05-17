<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="dashboard-menu">
                <h1>Personal Blog</h1>
            </div>
            <div class="blogs">
                <?php
                    // json file
                    $jsonFile = "data/article.json";
                    // file get contents
                    $jsonData = file_get_contents($jsonFile, true);
                    // json decode
                    $jsonDecode = json_decode($jsonData, JSON_PRETTY_PRINT);
                    // pagination
                    $perPage = 7;
                    $totalBlogs = count($jsonDecode);
                    $totalPages = ceil($totalBlogs / $perPage);
                    $currentPage = isset($_GET["page"]) ? (int)$_GET["page"]: 1;
                    $startIndex = ($currentPage - 1) * $perPage;
                    $currentBlogs = array_slice($jsonDecode, $startIndex, $perPage, true);
                    foreach($currentBlogs as $key => $data) {
                        ?>
                        <div class="col">
                            <a href="/article/<?php echo $key; ?>" class="menu-link">
                                <h2>
                                    <?php echo $data["title"]; ?>
                                </h2>
                            </a>
                            <a href="/article/<?php echo $key; ?>" class="menu-link">
                                <h2>
                                    <?php echo $data["date"]; ?>
                                </h2>
                            </a>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="pagination">
                <?php if($currentPage > 1): ?>
                    <a href="/?page=<?php echo $currentPage - 1; ?>" class="pagination-link">Previous</a>
                <?php endif; ?>
                <?php
                $startPage = $currentPage;
                $endPage = min($totalPages, $currentPage + 2); // three paginations
                $totalCurrentPages = $endPage - $currentPage;
                if($totalCurrentPages < 2) {
                    $startPage = max(1, $endPage - 2);
                }
                for($page = $startPage; $page <= $endPage; $page++) {
                    ?>
                    <a href="/?page=<?php echo $page; ?>" class="pagination-link">
                        <?php echo $page; ?>
                    </a>
                    <?php
                }
                ?>
                <?php if($currentPage < $totalPages): ?>
                    <a href="/?page=<?php echo $currentPage + 1; ?>" class="pagination-link">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>