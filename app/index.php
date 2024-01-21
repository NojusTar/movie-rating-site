<?php 
    include "database.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YMIR</title>
    <link rel="stylesheet" href="../styles/css/index.css">
</head>
<body>

    <?php include "partials/_header.php" ?>


    <div class="trailer-show-layout">
        <div class="grid">
            <main>
                <div class="main-img">
                    <img src="<?php 
                            if(isset($_GET["selection"]))
                            {
                                echo $allMovies[$_GET["selection"] -1]["img_dir"] ; 
                                
                            }
                            else
                            {
                                echo $allMovies[0]["img_dir"] ; 
                            }
                        ?>" alt="">
                </div>
                <!-- play button -->
                <div class="trailer-front">
                    <a href="player.php?selection=<?php
                      if(isset($_GET["selection"]))
                      {
                          echo $_GET["selection"] ; 
                      }
                      else
                      {
                          echo $allMovies[0]["id"] ; 
                      }
                      ?>"> 
                      <img src="../files/Menu/play.png" alt="">
                    </a>
                    
                    <div class="dideles-raides">
                        <!-- dideles raides -->
                        <?php 
                            if(isset($_GET["selection"]))
                            {
                                echo $allMovies[$_GET["selection"] -1]["name"] ; 
                            }
                            else
                            {
                                echo $allMovies[0]["name"] ; 
                            }
                        ?>
                     </div>
                </div>
            </main>      

            <aside>
            <?php
                    foreach($allMovies as $movieRow):
                ?>
                <a href="index.php?selection=<?php echo $movieRow["id"]; ?>">
                    <div class="aside-card">
                        <img src="<?php echo $movieRow["img_dir"]; ?>" alt="">
                        <div class="aside-card-syps">
                            <h4> <?php echo $movieRow["name"]; ?> </h4>
                            <br>
                            <p>
                                <?php echo $movieRow["description"]; ?>
                            </p>
                        </div>
                    </div>
                </a>
                <?php
                        endforeach; 
                ?>
            </aside>
            
        </div>
    </div>

    <div class="featured">

        <div class="featured-text">
            <img src="../files/Menu/Bar.png" alt="">
            FEATURED
        </div>
        
        <div class="featured-flex">

        <?php

            $fmovieQuery = "SELECT * FROM moviesfeat";

            $fmovieSqlResult = mysqli_query($conn, $fmovieQuery);

            $featMovies = mysqli_fetch_all($fmovieSqlResult, MYSQLI_ASSOC);

            foreach($featMovies as $movieRow):
        ?>

            <div class="featured-card">
                <img class="f-poster" src="<?php echo $movieRow["img_dir"]; ?>" alt="">
                
                <div class="f-rating">
                    <img src="../files/Menu/starRating.png" alt="">
                    <h4><?php echo $movieRow["rating"]; ?></h4>
                </div>

                <div class="featured-rating-flex">
                    <h4><?php echo $movieRow["name"]; ?></h4>
                    <div class="f-buttons">
                        <a href="player.php?selection=<?php echo $movieRow["id"]; ?>"><img src="../files/Menu/TrailerArrow.png" alt="">Trailer</a>
                    </div>
                </div>
                
            </div>

            <?php
                        endforeach;
                ?>

        </div>
    </div>

    <?php include "partials/_footer.php"; ?>
</body>
</html>