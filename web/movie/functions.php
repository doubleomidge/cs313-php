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

function deleteMovie($movieId){
  $db = dbConnect();
  $sql = 'DELETE FROM Movies WHERE movie_id = :id';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':id', $movieId, PDO::PARAM_INT);
  $stmt->execute();
  $delOutcome = $stmt->rowCount();
  return $delOutcome;
};

function updateMovie($movieId, $title, $desc, $year, $run, $rate, $type){
  $db = dbConnect();
    $sql = 'UPDATE movies 
      SET movie_title     = :title, 
          movie_year      = :year, 
          movie_desc      = :desc,
          movie_runtime   = :run, 
          movie_rating_id = :rate, 
          genre_id        = :gen,
          format_id       = :type
      WHERE movie_id = :movieId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':movieId', $movieId, PDO::PARAM_INT);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    $stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':run', $run, PDO::PARAM_INT);
    $stmt->bindValue(':rate', $rate, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    $updateOutcome = $stmt->rowCount();
    return $updateOutcome;
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

function addMovie($title, $desc, $year, $run, $rate, $type){
    $db = dbConnect();
    $sql = 'INSERT INTO movies VALUES(DEFAULT, :title, :year, :desc, :run, :rate, 1, 1, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    $stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':run', $run, PDO::PARAM_INT);
    $stmt->bindValue(':rate', $rate, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() == 0){
        return 0;
    }
    $addOutcome = $db->lastInsertId();
    return $addOutcome;
};

function addGenres($genre, $movieId) {
    $db = dbConnect();
    foreach($genre as $row) {
        $sql = 'INSERT INTO Genre_Movie VALUES(DEFAULT, :genre, :movie)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':movie', $movieId, PDO::PARAM_INT);
        $stmt->bindValue(':genre', (int)$row, PDO::PARAM_INT);
        $stmt->execute();
    }
    $genOutcome = $stmt->rowCount();
    return $genOutcome;
};

function modMovie($title, $desc, $year, $movieb, $digitalb, $run, $rate, $gen, $type) {
    $db = dbConnect();
    $sql = 'INSERT INTO movies VALUES(DEFAULT, :title, :year, :desc, :digitalb, :movieb, :run, :rate, :gen, 1, 1, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':year', $year, PDO::PARAM_INT);
    $stmt->bindValue(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindValue(':digitalb', $digitalb, PDO::PARAM_BOOL);
    $stmt->bindValue(':movieb', $movieb, PDO::PARAM_BOOL);
    $stmt->bindValue(':run', $run, PDO::PARAM_INT);
    $stmt->bindValue(':rate', $rate, PDO::PARAM_STR);
    $stmt->bindValue(':gen', $gen, PDO::PARAM_STR);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() == 0){
        return 0;
    }
    $addOutcome = $db->lastInsertId();
    return $modOutcome;
};

function getGenres ($movideId) {
    $db = dbConnect();
    $sql = 'SELECT * FROM Genre_Movie WHERE movie_id = :movie_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':movie', (int)$movieId, PDO::PARAM_INT);
    $stmt->execute();
    $genAll = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($genAll);
    exit;
    return $genAll;
}

function modGenres($genre, $movieId) {
    $db = dbConnect();
    foreach($genre as $row) {
        $sql = 'INSERT INTO Genre_Movie VALUES(DEFAULT, :genre, :movie)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':movie', $movieId, PDO::PARAM_INT);
        $stmt->bindValue(':genre', (int)$row, PDO::PARAM_INT);
        $stmt->execute();
    }
    $genOutcome = $stmt->rowCount();
    return $genOutcome;
};

function newUser($firstname, $lastname, $username, $password) {
  $db = dbConnect();
    $sql = 'INSERT INTO Userss VALUES(DEFAULT, :username, :first, :last, :password, 1)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':first', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':last', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $regOutcome = $stmt->rowCount();
    return $regOutcome;
};

function addUser($username, $firstname, $lastname, $email, $safepass) {
    $db = dbConnect();
    $sql = 'INSERT INTO Users VALUES(DEFAULT, :user, :first, :last, :pass, 1, :email)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':user', $username, PDO::PARAM_STR);
    $stmt->bindValue(':first', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':last', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':pass', $safepass, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $add = $stmt->rowCount();
    return $add;
};

function getPassword ($username) {
    $db = dbConnect();
    $sql = 'SELECT * FROM Users WHERE username = :username';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $pass = $stmt->fetch(PDO::FETCH_ASSOC);
    return $pass;
};

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword) {
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $clientPassword);
};

function getAllMovieDetails($movieId){
    $db = dbConnect();
    $sql = 'SELECT * FROM Movies m
                JOIN Genre_Movie gm ON m.movie_id = gm.movie_id
                JOIN Genre g ON gm.genre_id = g.genre_id
                JOIN Rating r ON m.movie_rating_id = r.rating_id
                JOIN Format f ON m.format_id = f.format_id
                JOIN Users u ON m.user_id = u.user_id
            WHERE m.movie_id = :movie_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':movie_id', $movieId, PDO::PARAM_INT);
    $stmt->execute();
    $movieInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $movieInfo;
};

function addCustomFormat($customFormat) {
    $db = dbConnect();
    $sql = 'INSERT INTO Format VALUES (DEFAULT, :type)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':type', $customFormat, PDO::PARAM_STR);
    $stmt->execute();
    $format = $stmt->rowCount();
    return $format;
}

function joinFamily($familyname, $userId) {
    $db = dbConnect();
    $sql = 'UPDATE Users WHERE user_id = :userId
                SET family_id = :family';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindValue(':family', $familyname, PDO::PARAM_STR);
    $stmt->execute();
    $format = $stmt->rowCount();
    return $format;
}

function orderTitle() {
    $db = dbConnect();
    $sql = 'SELECT * FROM Movies m ORDER BY movie_title';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $movieInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $movieInfo;
}

function findSimilarGen($genreId, $movieId) {
    $db = dbConnect();
    $sql = 'SELECT movie_id, movie_title FROM Movies
            WHERE genre_id = :genre_id AND movie_id != :movie_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':movie_id', $movieId, PDO::PARAM_INT);
    $stmt->bindValue(':genre_id', $genreId, PDO::PARAM_INT);
    $stmt->execute();
    $gen = $stmt->fetch(PDO::FETCH_ASSOC);
    return $gen;
}