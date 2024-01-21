<?php include "database.php"; ?>

<?php
    session_start();
?>

<header>
    <nav>
        <div class="logo"><a href="index.php">YIMIR</a></div>
        <div><a href="all-movies.php">MOVIES</a></div>
        <div class="search">
            
            <input type="text">
        </div>
        <!-- <div><a href="watchlist.php">WATCH LIST</a></div> -->

        <?php
            if(isset($_SESSION["auth"]) && $_SESSION["auth"] == true):
        ?>

                <div style="border: 1px solid var(--text-color); max-width: 200px;
                    padding: 0 5px; height: 20px; text-align: center; border-radius: 5px;">
                    <?php echo $_SESSION["user"]; ?>
                </div>

            <?php else: ?>

                <a href="login.php">LOG IN</a>

        <?php
            endif;
        ?>

        <?php
            if(isset($_SESSION["auth"]) && $_SESSION["auth"] == true):
        ?>

            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <input style="background-color: transparent; color: var(--text-color);
                    width: 100px; cursor: pointer;"
                type="submit" name="logout" value="LOG OUT">
            </form>

            <?php else: echo ""; ?>

            

        <?php
            endif;
        ?>
        

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $_SESSION["auth"] = false;
                header("Location:index.php");
            }
        ?>
    </nav>
</header>

