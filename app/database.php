<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "movies";

    try
    {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception)
    {
        echo"not connected";
    }

    try
    {
        $movieQuery = "SELECT * FROM moviesup";

        $movieSqlResult = mysqli_query($conn, $movieQuery);

        
    }
    catch(mysqli_sql_exception)
    {
        echo "movie table does not exist";
    }

    $allMovies = mysqli_fetch_all($movieSqlResult, MYSQLI_ASSOC);

    
    
    

?>