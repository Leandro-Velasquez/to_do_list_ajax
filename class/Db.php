<?php
    class Db {

        private $pdo;

        public function __construct()
        {
            try{
                $this->pdo = new PDO("mysql:host=localhost:3307;dbname=todolistdb;", "root", "");
            }
            catch(PDOException $e){
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }catch(Exception $e){
                die("Error generico: " . $e->getMessage());
            }
        }


    }
?>