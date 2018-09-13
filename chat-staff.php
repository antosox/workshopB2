<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css"></script>
    <!-- Feuilles CSS -->
    <link rel="stylesheet" href="css/choice.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">  
    <title>Staff Chat</title>
</head>
<body>
    <header>
        <a href="#" class="btn-return">
            <img src="img/sign-out-option.svg" alt="return">
        </a>
        <a href="#" class="btn-add_event">
            <img src="img/add-event.svg" alt="">
        </a>
        <a href="#" class="btn-off">
            <img src="img/disconnection.svg" alt="disconnection">
        </a>
        <div class="logo">
            <h1>
                <img src="img/logo.svg" alt="Evender">
            </h1>
        </div>
    </header>
    <main>
    <ul id="slide-out" class="sidenav">
            <li><a class="subheader one">Catégories</a></li>
            <li><a class="waves-effect" href="#!">Sport</a></li>
            <li><a class="waves-effect" href="#!">Culture</a></li>
            <li><a class="waves-effect" href="#!">Divertissements</a></li>   
            <li><div class="divider"></div></li>
            <li><a class="subheader two">Channels</a></li>
            <li><a class="waves-effect" href="chat-staff.php">Annonces</a></li>
            <li><a class="waves-effect chan-active" href="chat.php">Discussions</a></li>
        </ul>
        <p class="menu-icon">
            <a href="#" data-target="slide-out" class="sidenav-trigger">
                <img src="img/menu_nav.png" class="menu-icon" alt="Menu">
            </a>
        </p>
        <div class="chat-container">
            <div class="top">
                <a href="mailto:" class="mail">
                    <img src="img/mail.png" alt="mail">
                </a>
                <h2 class="title-event-staff">Titre de l'évènement</h2>
                <a href="" class="trash">
                    <img src="img/delete.png" alt="delete">
                </a>
            </div>
            <section id="space-chat">
                <div class="reponse_ws">
                    <div class="annonce-msg">
                        <h3>pseudo</h3>
                        <p>blablablalablablabla</p>
                    </div>
                </div>
            </section>
            <form action="">
                <div class="message-container">
                    <div class="input-field col s12 message">
                        <input type="text" name="message" id="message" placeholder="Ecrire son message">
                    </div>   
                    <div class="col s12 message-send">
                        <button class="btn waves-effect waves-light plane-send purple darken-3" onclick="submit()">
                            <i class="material-icons center">send</i>
                        </button>  
                    </div>     
                </div>
            </form>
        </div>
    </main>
    <footer>
        <a class="waves-effect waves-light btn modal-trigger purple darken-3" href="#modal1">Mes évènements</a>
        <!-- Modal Structure -->
        <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content">
                    <h4>Mes évènements</h4>
                    <table class="striped">
                        <tr class="event-row">
                            <td>
                                <a href="#" class="title-event">Titre</a>
                                <a href="#" class="annonces">Annonces</a>
                                <a href="#" class="discuss">Discussion</a>
                            </td>
                        </tr>
                        <tr class="event-row">
                            <td>
                                <a href="#" class="title-event">Titre</a>
                                <a href="#" class="annonces">Annonces</a>
                                <a href="#" class="discuss">Discussion</a>
                            </td>
                        </tr>
                        <tr class="event-row">
                            <td>
                                <a href="#" class="title-event">Titre</a>
                                <a href="#" class="annonces">Annonces</a>
                                <a href="#" class="discuss">Discussion</a>
                            </td>
                        </tr>
                        <tr class="event-row">
                            <td>
                                <a href="#" class="title-event">Titre</a>
                                <a href="#" class="annonces">Annonces</a>
                                <a href="#" class="discuss">Discussion</a>
                            </td>
                        </tr>
                        <tr class="event-row">
                            <td>
                                <a href="#" class="title-event">Titre</a>
                                <a href="#" class="annonces">Annonces</a>
                                <a href="#" class="discuss">Discussion</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
    </footer>
</body>
<script src="js/script.js"></script>
</html>