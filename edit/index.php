<?php
    session_start();
    if(!isset($_SESSION["login_success"])) {
        header("Location: ../login");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Edit</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>
                Edit Article
            </h1>
            <?php
                $url = $_SERVER["REQUEST_URI"];
                $explode = explode("/", $url);
                $urlId = $explode[2];

                // alert
                // session_start();
                if(isset($_SESSION['data_update'])) {
                    ?>
                        <p class="alert">
                            <?php echo $_SESSION['data_update']; ?>
                        </p>
                    <?php
                }
                // session_destroy();
            ?>

            <form action="../edit/edit.php" method="Post">
                <div class="col">
                    <label for="title">Title</label>
                    <input type="text" name="title">
                </div>
                <div class="col">
                    <label for="date">Date</label>
                    <input type="date" name="date">
                </div>
                <div class="col">
                    <label for="content">Content</label>
                    <textarea name="content"></textarea>
                </div>
                <input type="hidden" name="hidden" value="<?php echo $urlId; ?>">
                <div class="col btn-gp">
                    <button type="submit" class="submit">
                        Update
                    </button>
                    <a href="../dashboard" class="submit">
                        Back
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>