<?php

     $severName = "localhost";
     $userName = "root";
     $password = "";
     $DBname = "eCommerce_DB";
     $DSN = 'mysql:host='. $severName.';dbname='. $DBname;


    
            try {
                $connection = new PDO($DSN,$userName,$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage() . "<br>";
                die();
            }
       

