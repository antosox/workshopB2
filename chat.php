<?php
    namespace evender;
?>


<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">
    <title>Chat</title>
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
            <a href="mailto:" class="mail">
                <img src="img/mail.png" alt="mail">
            </a>
            <h2 class="title-event">Bowling</h2>
            <a href="" class="trash">
                <img src="img/delete.png" alt="delete">
            </a>
        </div>
        <section class="space-chat">
            <div class="sender">
                <h3>pseudo</h3>
                <p>blablablalablablabla</p>
            </div>
            <div class="receiver">
                <h3>pseudo</h3>
                <p>blablablalablablabla</p>
            </div>
        </section>
        <form action="">
            <input type="text" name="message" id="message" placeholder="Ecrire son message">
            <input type="submit" value="Envoyer">
        </form>
    </main>
    <footer>
        <a class="waves-effect waves-light btn modal-trigger purple darken-3" href="#modal1">Mes évènements</a>
            <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
            <div class="modal-content">
                <h4>Mes évènements</h4>
                <table class="striped">
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                    <tr>
                        <td><a href="\#">Event blablabla</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </footer>
</body>
<script src="js/script.js"></script>
</html>