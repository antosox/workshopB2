<?php 
    
    // load or reload a session ! have to be the first line
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';
    session_start();

        // Afficher les erreurs à l'écran
        ini_set('display_errors', 1);

    $erreur = false;

    if(isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {
        $_POST['password'] =  hash('sha1', $_POST['password']);
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
           
           
            $_SESSION['connected'] = true;


            header('Location: http://' . $_SERVER['HTTP_HOST']);
            exit();

        } else {
            
            // mot de passe incorect ou erreur

            var_dump($_POST['password']);
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <!-- <link rel="stylesheet" href="Css/modal.css">
        <link rel="stylesheet" href="Css/main.css"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">     
        <title>Connexion Evender</title>
    </head>
    <body class="connection">
        <header>
            <div class="logotype">
                <h1>
                    <img src="img/logo.svg" alt="Evender">
                </h1>
            </div>
        </header>
        <div id="login-wrapper">
            <h4>Connexion</h4>
            <form action="/login.php" method="post">
            <i class="material-icons prefix connexion">mail</i>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="login" class="login-input form-control<?php if ($erreur == true) echo " invalid"; ?>" value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" placeholder="Login" >
                </div>
            </div>
            <i class="material-icons prefix connexion">lock</i>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" name="password" class="login-input form-control<?php if ($erreur == true) echo " invalid"; ?>"value="<?php if (isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" placeholder="Mot de passe" >
                </div>
            </div>
            <div class="row">
                <button class="btn co_btn_sub purple darken-3" type="submit">Connexion</button>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/inscription.php" role="button" class="btn co_btn_ins orange darken-3" type="submit">Inscription</a>
            </div>
            </form>
        </div>
    </body>

</html>