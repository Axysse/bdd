<?php
require_once ('config/config.php');

$bdd = new bdd();
$bdd->connect();

session_start();

if (isset($_POST['envoyer'])) {

    $pseudo = htmlspecialchars(stripslashes(trim($_POST['pseudo'])));
    $password = htmlspecialchars($_POST['password']);

    $newUser = new Users();
    $newUser->setPseudo($pseudo);
    $newUser->setPassword(password_hash($password, PASSWORD_ARGON2ID));

    $bdd->addUser($newUser);
}


$users = $bdd->getAll();


if (isset($_POST['submit'])) {
    // $pseudo = htmlspecialchars($_POST['pseudo_con']);
    // $password = htmlspecialchars($_POST['password_con']);

    if ((!empty($_POST['pseudo_con'])) && (!empty($_POST['password_con']))) {
        $user = $bdd->userConnect(["pseudo" => $_POST['pseudo_con'], "pass" => $_POST['password_con']]);
        if ($user) {
            $_SESSION["user"] = $user;
            print "Mec c'est bon, laaaaaaache tout!";
        } else {
            print  "Casse les couilles gars!";
        }
    } else {
        print "T'as rien rentré";
    }
}
echo "<pre>";
var_dump($users);
echo "</pre>";
sdfdfsdf
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%; margin:auto;">
        <input type="text" name="pseudo" placeholder="pseudo">
        <input type="password" name="password" placeholder="mot de passe">
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</body>

<body>
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%; margin:auto;">
        <input type="text" name="pseudo_con" placeholder="pseudo">
        <input type="password" name="password_con" placeholder="mot de passe">
        <button type="submit" name="submit">Envoyer</button>
    </form>
</body>

</html>