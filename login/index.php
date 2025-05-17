<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Login</title>
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>Login</h1>
            <?php
                session_start();
                if(isset($_SESSION["username_err"])) {
                    ?>
                        <p class="alert">
                            <?php echo $_SESSION["username_err"]; ?>
                        </p>
                    <?php
                }
                if(isset($_SESSION["password_err"])) {
                    ?>
                        <p class="alert">
                            <?php echo $_SESSION["password_err"]; ?>
                        </p>
                    <?php
                }
                session_destroy();
            ?>
            <form action="../login/check.php" method="Post">
                <div class="col">
                    <label>Username</label>
                    <input type="text" name="username">
                </div>
                <div class="col">
                    <label>Password</label>
                    <input type="password" name="password">
                </div>
                <div class="col">
                    <button type="submit" class="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>