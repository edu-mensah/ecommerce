<?php
class DatabaseConnection
{
    private $severName = "localhost";
    private $userName = "root";
    private $password = "";
    private $DBname = "ecommerce_DB";
    private $databaseConnection;
    private $DSN = 'mysql:host='. $this->severName.';dbname='. $this->DBname;


    public function connection(){
        $this->databaseConnection;
            try {
                $this->databaseConnection = new PDO($this->DSN,$this->userName,$this->password);
                $this->databaseConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->databaseConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "Error!: " . $e->getMessage() . "<br>";
                die();
            }
        return $this->databaseConnection;
        } 

}