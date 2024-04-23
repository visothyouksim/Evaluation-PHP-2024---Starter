<?php

# Documentation PDO : https://www.php.net/manual/fr /pdo.connections.php

require_once 'config.php';

try {
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    // Set PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Option II : Permet de demander à PDO de retourner les résultats sous forme de tableaux associatifs
    # cf. https://www.php.net/manual/fr/pdostatement.fetch.php
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    # En cas d'erreur, celle-ci est capturée par le catch et affiché à l'utilisateur
    echo "Connection failed: " . $e->getMessage();

    # Puis, je coupe l'exécution du code PHP
    die();
}
