<?php

$facteurs = [
    "voiture" => 2.4,
    "avion" => 15.0,
    "bus" => 0.8,
    "velo" => 0.0,
    "marche" => 0.0,
    "viande" => 7.0,
    "electricite" => 0.3
];

/* Récupération des variables postés */
$nom = $_POST['nom'];
$transport = $_POST['choix'];
$viande = $_POST['viande'];
$electricite = $_POST['electricite'];


/* Calcul de l'empreinte totale */
$score = $facteurs[$transport] + $viande * $facteurs["viande"] + $electricite * $facteurs["electricite"] * 12;


/* Connection à la base SQL */
include('db.php');


/* Si données recuent de modifier.php */
if(isset($_GET['modify'])) {
    
    /* Récupération de l'id*/
    $id = $_GET['modify']; 

    /*Update dans la BDD*/
    $sql = "UPDATE utilisateurs SET nom='$nom',transport='$transport',repas_viande='$viande',consommation_electricite='$electricite',empreinte_totale='$score' WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    /*Redirection vers admin.php*/
    header("Location: admin.php");    
    exit();

    }


/* Insertion des données dans la base */
$sql = "INSERT INTO utilisateurs(nom,transport,repas_viande,consommation_electricite,empreinte_totale)
        VALUES('$nom','$transport','$viande','$electricite','$score')";

$stmt = $conn->prepare($sql);
$stmt->execute();

/* Récupération de l'id inséré */
$userid = $conn->lastInsertId();

/* Mise de l'id dans l'url de resultat.php */
header("Location: resultat.php?id=" . $userid);


?>