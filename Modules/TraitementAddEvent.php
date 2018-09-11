<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';
echo 'nop';
var_dump($_POST);
if (isset($_POST) && isset($_POST['title_event']) && isset($_POST['type']) && isset($_POST['date']) && isset($_POST['address_event']) && isset($_POST['desc'])) {
	
    $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    $req = $db->prepare("INSERT INTO `event` ( `local_event`, `Date`, `description`, `title`, `type`) values ( :adresse, :DateEvent, :descrip, :title, :typeEvent)");
    $req->bindValue('adresse', $_POST['address_event']);
    $req->bindValue(':DateEvent', $_POST['date']);
    $req->bindValue(':descrip', $_POST['desc']);
    $req->bindValue(':title', $_POST['title_event']);
    $req->bindValue(':typeEvent', $_POST['type']);
	$req->execute();

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

		$filename = $db->lastinsertid();

		if (move_uploaded_file($_FILES['EventImage']['tmp_name'], $target_dir . $filename . "." . $ext[1])) {

			$req = $db->prepare("UPDATE `event` SET `image` = '$filename . "." . $ext' WHERE id_event = $filename");
			$req->execute();

			echo "\nLe fichier " . basename($_FILES["EventImage"]["name"]) . " a été envoyé ! Redirection en cours...";
		
		} else {
		
			echo "Désolé, Il y a une une erreur dans votre envoi de fichier. Redirection en cours...";
		
		}

	}
   
	

}