<?php
session_start();
if (isset($_SESSION['session']) && $_SESSION['session'] != true) {
    header('location: http://litos.scriptperu.com');
    die();
}
class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'u142416532_litos';
        $this->user = 'u142416532_litos';
        $this->password = 'xU4~DWU>';
        $this->charset = 'utf8mb4';
    }
    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error de  conexión: ' . $e->getMessage());
        }
    }
}