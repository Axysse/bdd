<?php
session_start();

require_once ("bdd.php");

$log = [];

$bdd = new Bdd();
$bdd->connect();
$bdd->getAll();
var_dump($bdd);


// $bdd->addUsers("belugaMalin", "xoxoxo");
// var_dump($bdd); 


if (isset($_POST["envoi"])) {
    $password = password_hash($_POST["user_password"], PASSWORD_BCRYPT);
    $bdd ->addUsers($_POST["user_pseudo"], $password);
}

// if (isset($_POST["send"])) {
//     foreach ($log as $user) {
//         if ($user["pseudo"] == $_POST["pseudo"]) {

//     }
// }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <section>
        <h1>INSCRIPTION</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="user_pseudo" id="pseudo" />
            </li>
            <li>
                <label for="password">Password</label>
                <input type="text" name="user_password" id="password" />
            </li>
            <li>
                <button type="submit" name="envoi">Envoi</button>
            </li>
        </ul>
    </form>
    </section>
    <section>
        <h2>CONNEXION</h2>
        <form action="" method="POST">
        <ul>
            <li>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="user_pseudal" id="pseudo" />
            </li>
            <li>
                <label for="password">Password</label>
                <input type="text" name="user_pass" id="password" />
            </li>
            <li>
                <button type="submit" name="send">Envoi</button>
            </li>
        </ul>
        </form>
    </section>

</body>

</html>