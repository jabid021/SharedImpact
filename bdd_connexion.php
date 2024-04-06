<?php

function doSQL($request, $params = array()) {
  // Informations de connexion à la base de données
    $dsn = "mysql:host=localhost:3306;dbname=shared_impact";
    $username = "root";
    $password = "";

    try {
        // Créer une connexion PDO
        $pdo = new PDO($dsn, $username, $password);

        // Préparer la requête SQL
        $statement = $pdo->prepare($request);

        // Liaison des valeurs des paramètres
        foreach ($params as $key => $value) {
            $statement->bindParam($key, $params[$key]);
        }

        // Exécuter la requête
        $statement->execute();

        // Récupérer les résultats
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Retourner les résultats
        return $results;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion
        echo "Erreur de connexion : " . $e->getMessage();
        return false;
    }
}


function doUpdate($request, $params) {
  // Informations de connexion à la base de données
    $dsn = "mysql:host=localhost:3306;dbname=shared_impact";
    $username = "root";
    $password = "";

    try {
        // Créer une connexion PDO
        $pdo = new PDO($dsn, $username, $password);

        // Préparer la requête SQL
        $statement = $pdo->prepare($request);

        // Liaison des valeurs des paramètres
        foreach ($params as $key => $value) {
            $statement->bindParam($key, $params[$key]);
        }

        // Exécuter la requête
        $statement->execute();

        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        // En cas d'erreur de connexion
        echo "Erreur de connexion : " . $e->getMessage();
        return false;
    }
}
?>
