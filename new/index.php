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
    <title>Blog - New</title>
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>New Article</h1>
            <?php
            // session_start();
            if(isset($_SESSION["success"])) {
                ?>
                    <p class="alert">
                        <?php echo $_SESSION["success"]; ?>
                    </p>
                <?php
            }
            // session_destroy();
            ?>
            <form action="../new/new.php" method="Post">
                <div class="col">
                    <label>Title</label>
                    <input type="text" name="title">
                </div>
                <div class="col">
                    <label>Date</label>
                    <input type="date" name="date">
                </div>
                <div class="col">
                    <label>Content</label>
                    <textarea name="content"></textarea>
                </div>
                <div class="col btn-gp">
                    <button type="submit" class="submit">
                        Create
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