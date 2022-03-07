j<?php 

//Types de php
$engine = "mysql";

// IP
$host = "localhost";

//Port (par defaut, 3306)
$port = 8889;

//DB name
$dbName = "sakila";

// Nom d'utilisateur
$username = "root";

// Passeword
$passeword = "root";

// PDO : PHP DATA OBJECT
// ça permet de faire des requêtes SQL et de récupérer des résultats sous forme 
// de variables PHP (tableaux ou objets)
// fonctionne avec SQL PostGre SQL ou MySQL
// Il permet de ssécuriser vos requêtes
// DSN : Data Source Name
// $pdo = new PDO("mysql:host=localhost:$port;dbname=db_aviaton",root, root);

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username, $passeword);

echo "Connecté à la base de données $dbName";

// Etape 1 : on prépare la requête
// Statement, variable de type PDOstatement
$statement = $pdo->prepare("SELECT * FROM actor ORDER BY first_name");

// Etape 2 : On execute la requête
$statement->execute();

// Etape3 (uniquement si on fait un SELECT): On récupère LES résultats
// $actors = $statement->fetchAll();
// Si on veut récupérer UN résultat on utilise fetch();
// $statement->fetch();
$actors = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>acteurs</h1>
    <table>
        <thead>
            <th>ID</th>
            <th>Nom Prénom</th>
            <th>Dernière modification</th>
            <th>Movies</th>
        </thead>  
        <tbody>
            <?php foreach($actors as $actor): ?>
                <tr>
                    <td>
                        <?=$actor["actor_id"]?>   
                    </td>
                    <td>
                        <a href="http://localhost:8888/actor_movies.php?id=<?= $actor['actor_id'] ?>">
                            <?=$actor['first_name']?> <strong><?=$actor['last_name']?></strong>
                        </a>
                    </td>    
                    <td>
                        <?=$actor['last_update']?>
                    </td>
                    <td>
                        <a href="voir_film.php">Voir</a>
                    </td>
                    <td>
                        <a href="supp_actor.php?id=<?= $actor['actor_id']?>">
                            Supprimer   
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>   
        </tbody>
    </table>
    <a href="ajout_actor.php"><h2>ajouter un nom<h2></a>         
    <a href="session.php"><h3>connection</h3></a>
</body>
</html>