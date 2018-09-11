<?php
    namespace evender;
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">     <title>chat</title>
</head>

<body>
    <header>
        <button class="btn-add_event btn-flat">
            <img src="img/add-event.svg" alt="">
        </button>
        <button class="btn-off btn-flat">
            <img src="img/disconnection.svg" alt="disconnection">
        </button>
        <div class="logo">
            <h1>
                <img src="img/logo.svg" alt="Evender">
            </h1>
        </div>
    </header>
    <main>
        <div class="top">
            <a href="mailto:">
                <img src="img/mail.png" alt="mail">
            </a>
            <h2 class="title-event">Bowling</h2>
            <a href="">
                <img src="img/delete.png" alt="">
            </a>
        </div>
        <section>
            <div>
                <h3>pseudo</h3>
                <p>blablablalablablabla</p>
            </div>
            <div>
                <h3>pseudo</h3>
                <p>blablablalablablabla</p>
            </div>
        </section>
        <form action="">
            <input type="text" name="message" id="message" placeholder="Ecrire son message">
            <input type="submit" value="Envoyer">
        </form>
    </main>
</body>

</html>