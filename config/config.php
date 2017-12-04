<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=profil_pic_manager;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}