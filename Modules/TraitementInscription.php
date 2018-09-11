<?php

namespace evender;
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';



if (isset($_POST)) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
   
    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    $req = $db->prepare("SELECT email FROM user WHERE email = :email");
    $req->bindValue(':email', $email);
    $req->execute();
    $resultat= $req->fetch();

    $req = $db->prepare("SELECT id FROM ville WHERE nom = :ville");
    $req->bindValue(':ville', $ville);
    $req->execute();
    $verification = $req->fetch();
    
    if (empty($verification)) {

    $req = $db->prepare("INSERT INTO ville (nom) values ( :ville)");
    $req->bindValue(':ville', $ville);
    $req->execute();
    

    }
    
    if ($resultat == false && isset($verification) && ($password1 == $password2)) {
       $req = $db->prepare("INSERT INTO user ( `name`, `firstname`, email, `password`, `local` ) values ( :nom, :Prenom, :Email, :MDP, :ville)");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':Prenom', $prenom);
        $req->bindValue(':Email', $email); 
        $req->bindValue(':MDP', hash('sha256', $password1));
        $req->bindValue(':ville', $verification['id']);
        $req->execute();  
        header('location: http://' . $_SERVER['DOCUMENT_ROOT'] . '/login.php');
    }

else if ($resultat == false && $verification == null && ($password1 == $password2)) {

    $ville = $db->lastInsertId();
    $req = $db->prepare("INSERT INTO user ( `name`, `firstname`, `email`, `password`, `local`) values ( :nom, :Prenom, :Email, :MDP, :ville)");
     $req->bindValue(':nom', $nom);
     $req->bindValue(':Prenom', $prenom);
     $req->bindValue(':Email', $email); 
     $req->bindValue(':MDP', hash('sha256', $password1));
     $req->bindValue(':ville', $ville);
     $req->execute();
     header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');
 }


    else {
       
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/inscription.php');
    }

}