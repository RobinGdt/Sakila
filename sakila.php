<?php 

$engine = "mysql";
$host = "localhost";
$port = 8889;
$dbName = "sakila";
$username = "root";
$passeword = "root";

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName",$username, $passeword);

echo "Connecté à la base de données $dbName";

$statement = $pdo->prepare("SELECT * FROM actor ORDER BY first_name");

$statement->execute();

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