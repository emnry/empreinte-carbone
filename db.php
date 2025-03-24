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