<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/main.php';

if (isset($_POST)) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
   
    $db = Data_base::connect();
    $req = $db->prepare("SELECT email FROM personnes WHERE email = :email");
    $req->bindValue(':email', $email);
    $req->execute();
    $resultat= $req->fetch();

    $req = $db->prepare("SELECT id FROM ville WHERE nom = :ville");
    $req->bindValue(':ville', $ville);
    $req->execute();
    $verification = $req->fetchAll();
    if (verification == null) {

    $req = $db->prepare("Insert into ville (nom) values ( :ville)");
    $req->bindValue(':ville', $ville);
    $req->execute();


    }
    else {

    }


    
    if ($resultat == null && ($password1 == $password2) ) {
       $req = $db->prepare("INSERT INTO personnes ( Nom, Prenom, Email, MDP, ville) VALUES ( :nom, :Prenom, :Email, :MDP, :Campus)");
        $req->bindValue(':nom', $nom);
        $req->bindValue(':Prenom', $prenom);
        $req->bindValue(':Email', $email); 
        $req->bindValue(':MDP', hash('sha256', $password1));
        $req->bindValue(':ville', $ville);
        $req->execute();
        header('location: http://' . $_SERVER['DOCUMENT_ROOT'] . '/login.php');
    }
    
    else {
        header('location: http://' . $_SERVER['DOCUMENT_ROOT'] . '/inscription.php');
    }

}