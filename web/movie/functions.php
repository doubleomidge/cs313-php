<?php

function getMovieById($id){
    $db = dbConnect();
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);
    return $movie;
}