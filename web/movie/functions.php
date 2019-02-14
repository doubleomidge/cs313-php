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
  return $db;
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
    // $stmt->closeCursor();
    return $movieInfo;
};

function ratingList($ratings){
  if(isset($_POST['inputRating'])) {
            $rating = $_POST['inputRating'];

            $stmt = $db->prepare('SELECT * FROM Rating r
                                JOIN Movies m on r.rating_id = m.rating_id
                            WHERE r.rating_id=:id');

            $stmt->bindValue(':id', $rating, PDO::PARAM_INT);
            $stmt->execute();
            $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
};

function addMovie($title, $desc, $year, $movieb, $digitalb, $run, $rate, $gen, $type) {
    $db = dbConnect();
    $sql = 'INSERT INTO Movies VALUES(DEFAULT, :title, :year, :desc, :digitalb, :movieb, :run, :rate, :gen, 1, 1, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':title', $title, PDO::PARAM_STRING);
    $stmt->bindValue(':desc', $desc, PDO::PARAM_STRING);
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    $stmt->bindValue(':movieb', $movieb, PDO::PARAM_STRING);
    $stmt->bindValue(':digitalb', $digitalb, PDO::PARAM_STRING);
    $stmt->bindValue(':run', $run, PDO::PARAM_INT);
    $stmt->bindValue(':rate', $rate, PDO::PARAM_STRING);
    $stmt->bindValue(':gen', $gen, PDO::PARAM_STRING);
    $stmt->bindValue(':type', $type, PDO::PARAM_STRING);
    $stmt->execute();
    $movieInfo = $stmt->rowCount();
    return $movieInfo;
};