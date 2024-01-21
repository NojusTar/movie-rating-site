<?php
    include "database.php";
    $mSelection = $_GET["selection"];

        $playerQuery = "SELECT * FROM moviesup WHERE id = '$mSelection'";

        $movieSqlResult = mysqli_query($conn, $playerQuery);

        $playerMovie = mysqli_fetch_assoc($movieSqlResult);
?>

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

    <div class="player-layout">
        <div class="player">
            <video width="1200" controls>
                <source src="<?php echo $playerMovie["trailer_dir"]; ?>" type="video/mp4">
        </div>

        <div class="player-syn-layout">
            <div class="player-poster-layout">
                <img class="player-poster" src="<?php echo $playerMovie["img_dir"]; ?>" alt="">
                <div class="player-rating">
                    <img src="../files/Menu/starRating.png" alt="">
                    <img src="../files/Menu/starRating.png" alt="">
                    <img src="../files/Menu/starRating.png" alt="">
                    <img src="../files/Menu/starRating.png" alt="">
                    <img src="../files/Menu/starRating.png" alt="">
                    <div class="player-rating-numbers">
                        <h4><?php echo $playerMovie["rating"]; ?></h4>
                    </div>
                </div>
            </div>
            <div class="player-text-layout">
                <div class="player-name">
                    <h4> <?php echo $playerMovie["name"]; ?> </h4>
                </div>
                <p>
                    <?php echo $playerMovie["description"]; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="player-rate-layout">
        <div class="player-rate-text">
            <h4>LEAVE A RATING</h4>
        </div>
        <div class="player-rate-stars">
            <img src="../files/Menu/starRating.png" alt="">
            <img src="../files/Menu/starRating.png" alt="">
            <img src="../files/Menu/starRating.png" alt="">
            <img src="../files/Menu/starRating.png" alt="">
            <img src="../files/Menu/starRating.png" alt="">
        </div>
        <div class="player-rate-button">
            <input type="submit" name="rating" value="SUBMIT">
        </div>
        
    </div>

    <?php include "partials/_footer.php"; ?>
</body>
</html>

<?php mysqli_close($conn); ?>