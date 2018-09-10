<?php 

    // load or reload a session ! have to be the first line
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';
    session_start();

        // Afficher les erreurs à l'écran
        ini_set('display_errors', 1);

    $erreur = false;

    if(isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {

        sleep(1);
$db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
$statement = $db->prepare("SELECT * FROM user  WHERE Email = :email");
$statement->execute(array(":email" => $_POST['login']));
$statement->execute();
$answer = $statement->fetch();



if ($answer['password'] != $_POST['password']) {
    $answer = false;
}

        if($answer != false) {

            
            $_SESSION['user']['id'] = $answer['id_user'];
            
           
            $_SESSION['user']['login'] = $_POST['login'];
           
           
            $_SESSION['connected'] = true;


            header('Location: http://' . $_SERVER['HTTP_HOST']);
            exit();

        } else {
            
            // mot de passe incorect ou erreur

            $erreur = true;
            
        }

    }

?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="/Css/login.css">
        <link rel="stylesheet" href="/Css/main.css">
        <title>Identifiez-vous</title>

    </head>

    <body>

        <div id="login-wrapper" class="card mh-auto">

            <h1>Evender</h1>

            <hr>
            <br>

            <form action="/login.php" method="post">

                <label class="login-resp-label">Email</label>
                <div class="input-group mb-3 input-group-login">
                    <div class="input-group-prepend">
                        <span class="input-group-text login-label" style="width: 150px;">Email</span>
                    </div>
                    <input type="text" name="login" class="login-input form-control<?php if ($erreur == true) echo " invalid"; ?>" value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" >
                </div>

                <label class="login-resp-label">Mot De Passe</label>
                <div class="input-group mb-3 input-group-login">
                    <div class="input-group-prepend">
                        <span class="input-group-text login-label" style="width: 150px;">Mot De Passe</span>
                    </div>
                    <input type="password" name="password" class="login-input form-control<?php if ($erreur == true) echo " invalid"; ?>"value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" >
                </div>

                <div class="w-100-center">
                    <button class="btn" type="submit">connexion</button>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inscription.php" role="button" class="btn" type="submit">Inscription</a>
                </div>

            </form>
        
        </div>

    </body>

</html>