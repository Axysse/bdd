<?php


class bdd
{

    private $bdd;

    public function connect()
    {

        try {
            $this->bdd = new PDO("mysql:host=localhost;dbname=bdd;charset=utf8", "root", "");
            return $this->bdd;
        } catch (PDOException $e) {
            $error = fopen("error.log", "w");
            $txt = $e . "\n";
            fwrite($error, $txt);

            throw new Exception("MON PETIT!");
        }
    }

    public function getAll(){
       $done = $this->bdd->query("SELECT * FROM users");
       return $done->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUsers($pseudo, $pass) {
        $requete = "INSERT INTO users (pseudo, password) VALUES (:pseudo, :pass)";
        $result = $this->bdd->prepare($requete);
        $result->execute(["pseudo"=> $pseudo, "pass" => $pass]);
    }
}