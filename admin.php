<?php

/* Connection à la base SQL */
include 'db.php';

/* Si données de l'url presente delete de modifier.php */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    /* Suppression de la ligne dans la BDD*/
    $sql = "DELETE FROM utilisateurs WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    /*Redirection vers admin.php (Suppression des données dans l'url)*/
    header("Location: admin.php");
    exit();
}

/* Selection de toute les données de la table */
$sql = "SELECT * FROM utilisateurs";
$stmt = $conn->query($sql);

$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Liste des utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div>
        <h1>Liste des utilisateurs enregistrés</h1>
        <div class="container">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Empreinte Carbone</th>
                    <th>Transport Principal</th>
                    <th>Actions</th>
                </tr>

                <!-- Boucle php de création des lignes du tableau avec les données de la BDD -->
                <?php foreach ($utilisateurs as $utilisateur): ?>
                    <tr>
                        <td><?php echo $utilisateur['nom']; ?></td>
                        <td><?php echo $utilisateur['empreinte_totale']; ?></td>
                        <td><?php echo $utilisateur['transport']; ?></td>

                        <td>
                            <a href="admin.php?delete=<?php echo $utilisateur['id']; ?>">Supprimer</a>
                            <a href="modifier.php?id=<?php echo $utilisateur['id']; ?> " id='modifier'>Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <a href="index.php">Retour au formulaire</a>
    </div>
</body>

</html>