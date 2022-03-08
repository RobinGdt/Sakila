<?php

$id = filter_input(INPUT_GET, "id",FILTER_VALIDATE_INT);

$engine = "mysql";
$host = "localhost";
$port = 8889;
$dbName = "sakila";
$username = "root";
$passeword = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username, $passeword);

$marequete = $pdo->prepare("SELECT * FROM category WHERE category_id = :id");

$marequete->execute([
    ":id" => $id
]);

$marequete->setFetchMode(PDO::FETCH_ASSOC);

$categorie = $marequete->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<table>
    <thead>
        <th>ID du film</th>
        <th>Dernière mise à jour</th>
    </thead>
    <tbody>
        <tr>
            <td>
                <h2><?= $categorie['name']?></h2>
            </td>
            <td>
                <em><?=$categorie['last_update']?></em>
            </td>
        </tr>
    </tbody>

</table>    
</body>
</html>