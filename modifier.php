<?php

/* Connection à la base SQL */
include('db.php');

$id = $_GET['id'];

/* Récupération des données à partir de l'id */
$sql = "SELECT * FROM utilisateurs WHERE id = $id";
$stmt = $conn->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Modification des informations</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='script.js'></script>
</head>

<body>


    <form method='post' action='traitement.php?modify=<?php echo $user['id']?>'>

        <h1>Modifier les informations de <?php echo $user['nom']?> </h1>

        <p class='question'> Nom : </p>

        <input name="nom" id="nom" min=0 type='text' placeholder="Votre nom" value ="<?php echo $user['nom'];?>" required>
        

        <p class='question'>🚗 Mode de transport principal : </p>
        
        <select name="choix" id="transport" onchange="inputchange()" required>
            <option value="">Choisissez un moyen de transport</option>
            <option value="bus" <?php if($user['transport'] == "bus") echo "selected"; ?>>Bus</option>
            <option value="voiture" <?php if($user['transport'] == "voiture") echo "selected"; ?>>Voiture</option>
            <option value="velo" <?php if($user['transport'] == "velo") echo "selected"; ?>>Vélo</option>
            <option value="avion" <?php if($user['transport'] == "avion") echo "selected"; ?>>Avion</option>
            <option value="marche" <?php if($user['transport'] == "marche") echo "selected"; ?>>Marche</option>
        </select>


        <p class='question'>🥩 Nombre de repas contenant de la viande par semaine : </p>

        <input name="viande" id="viande" value ="<?php echo $user['repas_viande'];?>" min=0 type='number' onchange="inputchange()" placeholder=0 required>

        <p class='question'>🔌 Consommation d'électricité (kWh/mois) : </p>

        <input name="electricite" id="electricite" value ="<?php echo $user['consommation_electricite'];?>" min=0 type='number' onchange="inputchange()" placeholder=0 required>

        <input type='submit' onclick='' value='Modifier les informations'>

        <progress id="progressbar" value="0" max="500"></progress> 

    

    </form>

</body>

</html>