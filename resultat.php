<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Résultat - Calculateur d'empreinte carbone</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='script.js'></script>
</head>

<body>
    <div>
        <?php

        /* Connection à la base SQL */
        include("db.php");

        /* Selection des données de l'utilisateur ayant l'id présent dans l'url */
        if (isset($_GET['id'])){
            $id = $_GET['id'];

            $sql = "SELECT * FROM utilisateurs WHERE id = $id"; 
            
            $result = $conn->query($sql);

            $user = $result->fetch(PDO::FETCH_ASSOC);


        }

        $nom = $user['nom'];
        $transport = $user['transport'];
        $viande = $user['repas_viande'];
        $electricite = $user['consommation_electricite'];
        $score = $user['empreinte_totale'];
        
        echo "<h1>Bonjour ".$nom."</h1>";
        echo "<h2> Votre empreinte carbone annuelle est de : " . $score . " kg CO² </h2>";

        /* Conseils */
        if (($transport == 'voiture') || ($viande > 7) || ($electricite > 500)){
            echo "<h3> Conseils pour réduire votre empreinte carbone : </h3>";
        }
        
        else {
            echo "<h3> Parfait ! Vous faites un excellent travail pour la planète. </h3>";
        }

        
        if ($transport == 'voiture') {
            echo "<p>🚌 Essayer le covoiturage ou les transports en commun</p>";
        }

        if ($viande > 7) {
            echo "<p>🥗 Essayez de réduire votre consommation de viande.</p>";
        }

        if ($electricite > 500) {
            echo "<p>⚡ Essayez de choisir des appareils basse consommation ou d’éteindre les équipements inutilisés.</p>";
        }

        ?>

    <a href="index.php">Revenir au formulaire</a>

    </div>

</body>

</html>