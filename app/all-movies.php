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

    <div class="big-text">
            <h1>ALL MOVIES</h1>
        </div>

    <div class="table-container">
        <table>
            <tr>
                <th class="table-image">Movie</th>
                <th class="table-description">Description</th>
            </tr>
                <?php
                    foreach($allMovies as $movieRow):
                ?>
            <tr>
                <td class="table-img-td">
                    <div class="tb-img-div">
                        <a href="player.php?selection=<?php echo $movieRow["id"]; ?>">
                            <img src="<?php echo "" . $movieRow["img_dir"]; ?>" alt="">
                        </a>
                    </div>  
                </td>  
                <td>
                    <div class="tb-name-div">
                        <?php echo "" . $movieRow["name"]; ?>
                    </div>
                    <div class="tb-desc-div">
                        <?php echo "" . $movieRow["description"]; ?>
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