<?php

include ('users.php');

class bdd
{

    private $bdd;

    public function connect()
    {

        try {
            $this->bdd = new PDO("mysql:host=localhost;dbname=bdd", 'root', '');

            return $this->bdd;
        } catch (PDOException $e) {

            $error = fopen("error.log", "w");
            $txt = $e . "\n";
            fwrite($error, $txt);

            throw new Exception("non garçon");
        }

    }

    public function getAll()
    {
        $sql = "SELECT * FROM users";

        $done = $this->bdd->query($sql);

        return $done->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser(Users $user): void
    {

        $pseudo = $user->getPseudo();
        $password = $user->getPassword();

        $sql = $this->bdd->prepare("INSERT INTO users (pseudo, password) VALUES (:pseudo, :pass)");
        $sql->bindParam(":pseudo", $pseudo);
        $sql->bindParam(":pass", $password);
        $sql->execute();

    }

    public function userConnect($param = [])
    {
        $users = $this->getAll();

        foreach ($users as $user) {
            if (($param["pseudo"] == $user["pseudo"]) && password_verify($param["pass"], $user["password"])) {
                return $user;
            }
        }
    }
}