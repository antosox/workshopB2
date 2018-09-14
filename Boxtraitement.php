<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';

$db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

    $iduser = $_POST['iduser'];
    $id_event = $_POST['idevent'];
    $organisation = $_POST['organisation'];
    $prix = $_POST['prix'];
    $ambiance = $_POST['ambiance'];
    var_dump($_POST);

    $req = $db->prepare("UPDATE `event` SET `ambiance` = ambiance + :ambiance , `prix` = prix + :prix, `organisation` = organisation + :organisation WHERE `event`.`id_event` = :eventid ");
    $req->bindValue(':ambiance', $ambiance);
    $req->bindValue(':prix', $prix);
    $req->bindValue(':organisation', $organisation);
    $req->bindValue(':eventid', $id_event);
    $req->execute();

    $req = $db->prepare("UPDATE `event_users` SET `vote` = '1' WHERE `event_users`.`id_event` = :idevent AND `event_users`.`id_user` = :iduser ");
    $req->bindValue(':idevent', $id_event);
    $req->bindValue(':iduser', $iduser);
    $req->execute();
       

?>

