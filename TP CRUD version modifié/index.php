<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <title>EX CRUD</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <h2>Crud en Php</h2>
        </div>
        <div class="row">
            <a href="add.php" class="btn btn-success">Ajouter un user</a>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">

                    <thread>
                        <th>Microservice ID</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Contenu</th>
                        <th>Prix</th>
                        <th>Categorie ID</th>
                        <!-- <th>Comment</th>
                        <th>metier</th>
                        <th>Url</th>
                        <th>Edition</th> -->
                    </thread>


                    <!-- on inclut notre fichier de connection -->
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    //on se connecte à la base 
                    $sql = 'SELECT * FROM microservices';
                    //on formule notre requete
                    var_dump($pdo->query($sql));
                    foreach ($pdo->query($sql) as $row) {
                        //on cree les lignes du tableau avec chaque valeur retournée

                        echo '<tr>';
                        echo '<td>' . $row['microservice_id'] . '</td>';
                        echo '<td>' . $row['titre'] . '</td> ';
                        echo '<td>' . $row['auteur'] . '</td>';
                        echo '<td>' . $row['contenu'] . '</td>';
                        echo '<td>' . $row['prix'] . '</td>';
                        echo '<td>' . $row['categorie_id'] . '</td>';
                        // echo '<td>' . $row['comment'] . '</td>';
                        // echo '<td>' . $row['metier'] . '</td>';
                        // echo '<td>' . $row['url'] . '</td>';
                        echo '<td>';
                        echo '<a class="btn" href="edit.php?id=' . $row['microservice_id'] . '">Read</a>';
                        // un autre td pour le bouton d'edition
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-success" href="update.php?id=' . $row['microservice_id'] . '">Update</a>';
                        // un autre td pour le bouton d'update
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $row['microservice_id'] . ' ">Delete</a>';
                        // un autre td pour le bouton de suppression
                        echo '</td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    //on se deconnecte de la base

                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>