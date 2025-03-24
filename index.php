<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estimation empreinte carbone</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='script.js'></script>
</head>

<body>

    <form method='post' action='traitement.php'>

        <h1>Estimez votre empreinte carbone</h1>

        <p class='description'>Remplissez ce formulaire pour voir l'impact de vos habitudes sur l'environnement.</p>
    

        <p class='question'> Votre nom : </p>

        <input name="nom" id="nom" min=0 type='text' placeholder="Votre nom" required>
        

        <p class='question'>🚗 Mode de transport principal : </p>

        
        <select name="choix" id="transport" onchange="inputchange()" required>

            <option value="">Choisissez un moyen de transport</option>

            <option value="bus">Bus</option>
            <option value="voiture">Voiture</option>
            <option value="velo">Velo</option>
            <option value="avion">Avion</option>
            <option value="marche">Marche</option>


        </select>


        <p class='question'>🥩 Nombre de repas contenant de la viande par semaine : </p>

        <input name="viande" id="viande" min=0 type='number' onchange="inputchange()" placeholder=0 required>
        

        <p class='question'>🔌 Consommation d'électricité (kWh/mois) : </p>

        <input name="electricite" id="electricite" min=0 type='number' onchange="inputchange()" placeholder=0 required>

        <input type='submit' onclick='' value='Calculer mon empreinte carbone'>


        <progress id="progressbar" value="0" max="500"></progress> 



        


    </form>

</body>

</html>