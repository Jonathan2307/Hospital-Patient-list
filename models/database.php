<?php

class Database
{
    private $dbname = 'hospitalE2N';
    private $user = 'exo';
    private $password = '3n56X8hQR85DD8kB';

    protected function connectDatabase()
    {
        try {
            $database = new PDO("mysql:host=localhost;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $database;
        } catch (Exception $error) {
            die("Failed: " .  $error->getMessage());
        }
    }
}
