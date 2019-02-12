<?php

function dbConnect() {
    try
  {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
};

function getMovieById($movieId){
    $db = dbConnect();
    $sql = 'SELECT * FROM Movies WHERE movie_id = :movie_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':movie_id', $movieId, PDO::PARAM_INT);
    $stmt->execute();
    $movieInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $movieInfo;
};