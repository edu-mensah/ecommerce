<?php
// class DatabaseConnection
// {
    $severName = "localhost";
    $userName = "root";
    $password = "edu@root";
    $DBname = "e_commerce_DB";




     $DSN = 'mysql:host='. $severName.';dbname='. $DBname;


    // public function connection(){
            try {
                $DatabaseConnection = new PDO($DSN,$userName,$password);
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage() . "<br>";
                die();
            }
//         } 

// }