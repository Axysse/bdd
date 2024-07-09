<?php
session_start();
require_once("bdd.php");



if (isset($_POST["pseudo"]) && $_POST["password"]) {
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $sql = "";

}