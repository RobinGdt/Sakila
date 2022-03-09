<?php

$id = filter_input(INPUT_GET, "id",FILTER_VALIDATE_INT);

if ($id) {
    $name = filter_input(INPUT_POST, 'name');
    var_dump($name);

    $engine = "mysql";
    $host = "localhost";
    $port = 8889;
    $dbName = "sakila";
    $username = "root";
    $passeword = "root";
    $pdo = new PDO("$engine:host=$host:$port;dbname=$dbName", $username, $passeword);

    $marequete = $pdo->prepare("DELETE FROM actor WHERE actor_id = :id");

    $marequete->execute([
        ":id" => $id
    ]);
    header('Location: http://localhost:8888/sakila.php');
    exit(); 
};    
?>