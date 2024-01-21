<?php include "database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>YMIR</title>
    <link rel="stylesheet" href="../styles/css/index.css">
</head>
<body>

    <?php include "partials/_header.php" ?>
    

    <div class="login-layout">
        <div class="login-text">
            <h1>LOG IN</h1>
        </div>
        <div class="login-input">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" required>
                <br>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" required>

                <div class="login-buttons">
                    Don't have an account?
                    <img src="../files/Menu/PointArrow.png" alt="">
                    <a href="signup.php"> Sign up</a>
                    <input type="submit" name="login" value="Log in">
                </div>
            </form>
        </div>
    </div>

    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);

                if($_POST["password"] == $row["password"])
                {
                    session_start();
                    $_SESSION["auth"] = true;
                    $_SESSION["user"] = $row["username"];

                    header("Location: index.php");
                }
                else
                {
                    echo"incorrect password";
                }
                
            }
            else
            {
                echo"no user found";
            }

            
        }
    ?>

    <?php include "partials/_footer.php"; ?>
</body>
</html>