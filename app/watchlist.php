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

    <?php include "partials/_header.php"; ?>

    <?php 
        $test = "1, 2, 3";
        
        $wmovieQuery = "SELECT * FROM moviesup where id in ($test)";

        $wmovieSqlResult = mysqli_query($conn, $wmovieQuery);

        $wListMovies = mysqli_fetch_all($wmovieSqlResult, MYSQLI_ASSOC);

        print_r($wListMovies);
    ?>

    <div class="big-text">
            <h1>WATCH LIST</h1>
        </div>

    <div class="table-container">
        <table>
        <tr>
                <th class="table-image">Movie</th>
                <th class="table-description">Description</th>
            </tr>
                <?php
                    foreach($wListMovies as $wmovieRow):
                ?>
            <tr>
                <td class="table-img-td">
                    <div class="tb-img-div">
                        <a href="player.php?selection=<?php echo $wmovieRow["id"]; ?>">
                            <img src="<?php echo "" . $wmovieRow["img_dir"]; ?>" alt="">
                        </a>
                    </div>  
                </td>  
                <td>
                    <div class="tb-name-div">
                        <?php echo "" . $wmovieRow["name"]; ?>
                    </div>
                    <div class="tb-desc-div">
                        <?php echo "" . $wmovieRow["description"]; ?>
                    </div>
                    
                </td>
            </tr>
                <?php
                        endforeach;
                ?>
        </table>
    </div>

    <?php include "partials/_footer.php"; ?>
</body>
</html>