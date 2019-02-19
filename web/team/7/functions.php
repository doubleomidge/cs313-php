<?php

function addUser ($username, $safepassword) {
    $db = dbConnect();
    $sql = 'INSERT INTO User7 VALUES(DEFAULT, :username, :password)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $add = $stmt->rowCount();
    return $add;
}