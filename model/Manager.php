<?php
    
/**
 * Class Manager
 *
 * Gère la connexion à la base de données.
 */
class Manager {
    
    protected function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    
    
    
}

?>