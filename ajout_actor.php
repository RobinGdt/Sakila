<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = filter_input(INPUT_POST,'name');
    var_dump($name);
    $lastname = filter_input(INPUT_POST,'lastname');
    var_dump($lastname);

    $engine = "mysql";
    $host = "localhost";
    $port = 8889;
    $dbName = "sakila";
    $username = "root";
    $passeword = "root";
    $pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username, $passeword);

    $marequete = $pdo->prepare("INSERT INTO actor (first_name, last_name) VALUES(:name, :lastname)");

    $marequete->execute([
        ":name" => $name,
        ":lastname" => $lastname
    ]);
    
    header('Location: http://localhost:8888/sakila.php');
    exit();

}else{
    echo('on est en GET');
};

?>

<form method="POST">
    <label for=""><h1>Ajouter un nom</h1></label>
    <input type="text" id="ajout_actor" name="name"/>

    <label for=""><h1>Ajouter un Prénom</h1></label>
    <input type="text" id="ajout_actorr" name="lastname"/>

    <input type="submit" value="ajouter un nom">
</form>