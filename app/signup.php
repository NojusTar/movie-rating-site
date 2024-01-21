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
            <h1>SIGN UP</h1>
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
                <br>
                <br>
                <label for="email">Email</label>
                <br>
                <input type="email" name="email" required>

                <div class="login-buttons">
                    <input type="submit" name="register" value="Sign Up">
                </div>
            </form>
            
        </div>
        
    </div>

    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            

            $sql = "INSERT INTO users (username, password, email)
                VALUES ('$username', '$password', '$email')";
            
            mysqli_query($conn, $sql);

            header("Location: login.php");
            
        }
    ?>

    <?php include "partials/_footer.php"; ?>

    
</body>
</html>