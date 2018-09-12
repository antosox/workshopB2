<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';

session_start();
var_dump($_SESSION);
var_dump($_POST);


if (isset($_POST) && isset($_POST['title_event']) && isset($_POST['type']) && isset($_POST['date']) && isset($_POST['address_event']) && isset($_POST['desc'])) {
echo 'pass';
$_POST['time']  = date("H:i", strtotime($_POST['time']));
$_POST['date'] = str_replace('/', '-', $_POST['date']);
$_POST['date'] = date('Y-m-d', strtotime($_POST['date']));
$_POST['date'] = $_POST['date'] . ' ' . $_POST['time'];
	
    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    $req = $db->prepare("INSERT INTO `event` ( `local_event`, `Date`, `description`, `title`, `type`) values ( :adresse, :DateEvent,  :descrip, :title, :typeEvent)");
    $req->bindValue(':adresse', $_POST['address_event']);
	$req->bindValue(':DateEvent', $_POST['date']);
    $req->bindValue(':descrip', $_POST['desc']);
    $req->bindValue(':title', $_POST['title_event']);
    $req->bindValue(':typeEvent', $_POST['type']);
	$req->execute();
var_dump($_POST);
	$target_dir = $_SERVER['DOCUMENT_ROOT']  . "/Assets/Events/";

	$target_file = $target_dir . basename($_FILES["EventImage"]["name"]);

	var_dump($_FILES);
	$ext = explode('/', $_FILES['EventImage']['type']);

	$isupload = 1;

	if (isset($_POST["submit"])) {

		$check = getimagesize($_FILES["EventImage"]["tmp_name"]);

		if ($check !== false) {

			$isupload = 1;
		
		} else {
		
			echo "Le fichier n'est pas une image !";
			$isupload = 0;
		
		}
	}

	$typeAccepted = array("image/jpeg", "image/jpg", "image/png");

	if (!in_array($_FILES["EventImage"]["type"], $typeAccepted)) {

		echo "Désolé, seulement JPG, JPEG et PNG sont autorisé sur Collabs \n";
		$isupload = 0;
	
	}

	if ($_FILES["EventImage"]["size"] > 500000) {

		echo "Aie votre Avatar est trop lourd !";
		$isupload = 0;
	
	}

		
	if ($isupload == 0) {
		
		echo "Votre fichier n'a pas été upload !";
	
	} else {

		$eventid = $db->lastinsertid();
		$ext = $ext[1];
		if (move_uploaded_file($_FILES['EventImage']['tmp_name'], $target_dir . $eventid .'.'. $ext)) {

			$req = $db->prepare("UPDATE `event` SET `image` = '$eventid.$ext' WHERE id_event = $eventid");
			$req->execute();

			$req = $db->prepare("INSERT INTO `event_users` (`id_event`, `id_user`, `Admin`) VALUES ( :idevent, :iduser, :adminval)");
			$req->bindValue(':idevent', $eventid);
			$req->bindValue(':iduser', $_SESSION['user']['id']);
			$req->bindValue(':adminval', 1);
			$req->execute();

			$req = $db->prepare("INSERT INTO `channel` (`etat`) VALUES ( :etat )");
			$req->bindValue(':etat', 0);
			$req->execute();

			$idchan = $db->lastInsertId();
			var_dump($idchan);

			$req = $db->prepare("INSERT INTO `events_channels` (`id_event`,`id_channel` ) VALUES ( :idevent, :idchan)");
			$req->bindValue(':idevent', $eventid);
			$req->bindValue(':idchan', $idchan);
			$req->execute();

			$req = $db->prepare("INSERT INTO `channel`( `etat`) VALUES (:etat )");
			$req->bindValue(':etat', 1);
			$req->execute();

			$idchan = $db->lastInsertId();
			var_dump($idchan);
			$req = $db->prepare("INSERT INTO `events_channels` (`id_event`,`id_channel` ) VALUES ( :idevent, :idchan)");
			$req->bindValue(':idevent', $eventid);
			$req->bindValue(':idchan', $idchan);
			$req->execute();




			echo "\nLe fichier " . basename($_FILES["EventImage"]["name"]) . " a été envoyé ! Redirection en cours...";
		
		} else {
		
			echo "Désolé, Il y a une une erreur dans votre envoi de fichier. Redirection en cours...";
		
		}

	}
   
	

}
header('location: http://' . $_SERVER['HTTP_HOST'] . '/index.php');