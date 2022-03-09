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

    $marequete = $pdo->prepare("DELETE FROM category WHERE category_id = :id");

    $marequete->execute([
        ":id" => $id
    ]);
    header('Location: http://localhost:8888/categories.php');
    exit();
};    
?>

