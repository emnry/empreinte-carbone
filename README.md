# 🌳 Calculateur d'Empreinte Carbone

Ce projet est un calculateur d'empreinte carbone simple, développé en PHP, qui permet aux utilisateurs d'estimer leur impact environnemental en fonction de leurs habitudes de transport, de consommation de viande et d'électricité. Il inclut également une interface d'administration pour gérer les données des utilisateurs.

## ✨ Fonctionnalités

* **Formulaire d'estimation :** Les utilisateurs peuvent saisir leur nom, leur mode de transport principal, leur consommation de viande et d'électricité pour calculer leur empreinte carbone.
* **Résultats personnalisés :** Les résultats affichent l'empreinte carbone calculée et fournissent des conseils pour réduire l'impact environnemental.
* **Interface d'administration :** Les administrateurs peuvent visualiser, modifier et supprimer les données des utilisateurs.
* **Base de données MySQL :** Les données des utilisateurs sont stockées dans une base de données MySQL.

##  Structure du Projet

* `admin.php` : Interface d'administration pour gérer les utilisateurs.
* `db.php` : Script de connexion à la base de données MySQL.
* `index.php` : Formulaire principal pour l'estimation de l'empreinte carbone.
* `modifier.php` : Page pour modifier les informations d'un utilisateur.
* `resultat.php` : Affiche les résultats de l'estimation de l'empreinte carbone.
* `script.js` : Script JavaScript pour la gestion de la barre de progression et des interactions utilisateur.
* `styles.css` : Feuille de style CSS pour la mise en page.
* `traitement.php` : Script PHP pour traiter les données du formulaire et interagir avec la base de données.

## ️ Prérequis

* Serveur web (Apache, Nginx, etc.) avec PHP installé.
* Base de données MySQL.
* Navigateur web.

##  Installation

1.  **Clonez le dépôt :**

    ```bash
    git clone https://github.com/emnry/empreinte-carbone.git
    ```

2.  **Configurez la base de données :**

    * Créez une base de données MySQL nommée `empreinte_carbone`.
    * Importez le schéma de la base de données (si fourni) ou créez une table `utilisateurs` avec les colonnes suivantes :
        * `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
        * `nom` (VARCHAR)
        * `transport` (VARCHAR)
        * `repas_viande` (INT)
        * `consommation_electricite` (INT)
        * `empreinte_totale` (FLOAT)

3.  **Configurez la connexion à la base de données :**

    * Modifiez le fichier `db.php` avec les informations de votre base de données (nom d'hôte, nom de la base de données, nom d'utilisateur, mot de passe).

    ```php
    <?php
    try{
        $servname ='localhost';
        $dbname='empreinte_carbone';
        $user='root';
        $pass='';
        $conn = new PDO( "mysql:host=$servname;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
        }
    ?>
    ```

4.  **Placez les fichiers sur le serveur web :**

    * Copiez tous les fichiers du projet dans le répertoire racine de votre serveur web.

5.  **Accédez au site :**

    * Ouvrez votre navigateur web et accédez à l'URL de votre serveur web.

## ‍ Utilisation

* **Formulaire d'estimation :** Remplissez le formulaire sur `index.php` et cliquez sur "Calculer mon empreinte carbone".
* **Résultats :** Les résultats s'affichent sur `resultat.php`.
* **Administration :** Accédez à `admin.php` pour gérer les utilisateurs.

## ⚠️ Notes

* Ce projet est un exemple simple et peut être amélioré en ajoutant des fonctionnalités supplémentaires, telles que l'authentification des utilisateurs, des graphiques pour visualiser les données, etc.
* La sécurité n'est pas la priorité de ce projet, il est donc fortement conseillé de ne pas l'utiliser en production sans implémenter des mesures de sécurité appropriées.
* Les facteurs d'empreinte carbone utilisés dans ce projet sont des valeurs approximatives et peuvent varier en fonction de la région et d'autres facteurs.
