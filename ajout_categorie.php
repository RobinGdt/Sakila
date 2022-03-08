<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = filter_input(INPUT_POST,'name');
    var_dump($name);

    $engine = "mysql";
    $host = "localhost";
    $port = 8889;
    $dbName = "sakila";
    $username = "root";
    $passeword = "root";
    $pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username, $passeword);

    $marequete = $pdo->prepare("INSERT INTO category (name) VALUES(:name)");

    $marequete->execute([
        "name" => $name
    ]);
    
    header('Location: http://localhost:8888/categories.php');
    exit();

}else{
    echo('on est en GET');
};

?>

<form method="POST">
    <label for=""><h1>Ajouter une catégorie</h1></label>
    <input type="text" id="category_name" name="name" />

    <input type="submit" value="creer_categorie">
</form>
