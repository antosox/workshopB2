<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Addon_chat.php';

$chat = new Addon_chat();

    $id_user = $_SESSION['user']['id'] = '9';
    $id_chat = $_SESSION['chat']['id'] = '10';
    $id_event = $_SESSION['event']['id'] = '11';
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
            <h2 class="title-event">
            <?php $title = $chat->event_name($id_event); 
            echo($title['title']);?></h2>
            <?php 
            if(!empty($chat->is_event_admin($id_user, $id_event))){ ?>
            <a href="" class="trash">
                <img src="img/delete.png" alt="delete">
            </a><?php } ?>
        </div>
        <section class="space-chat">
        <?php 
            $nbr_chat = $chat->nbr_message($id_chat);
        ?>
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
        <div class="input-field col s12">
            <input type="text" name="message" id="message" placeholder="Ecrire son message">
<<<<<<< HEAD
<<<<<<< HEAD
        </div>            
        <input class="plane-send" type="submit" value="Envoyer">
=======
=======
>>>>>>> master
        </div>
        <div class="input-field col s12">
            <input class="plane-send" onclick="submit()" value="Envoyer">
        </div> 
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> master
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
<script>
            var ws = new WebSocket('ws://localhost:9000');
            console.log(ws);
            ws.onopen = function () {
                console.log('websocket is connected ...');
            }
        
            ws.onmessage = function (event) {
                    var msg = JSON.parse(event.data);
            console.log(msg);
            const scrolls = document.getElementById('reponse_ws');
            let newDiv = document.createElement('div');
                if (msg.mine == 0) {
                    newDiv.className = "receiver";
                    newDiv.innerHTML = msg.user + "<br>" + msg.message;
                    scrolls.append(newDiv);
                } else {
                    newDiv.className = "sender";
                    newDiv.innerHTML = msg.user + "<br>" + msg.message;
                    scrolls.append(newDiv);
                }
            element = document.getElementById('div_scroolable_avec_tout_le_chat');
            element.scrollTop = element.scrollHeight;
            }

function submit() {

            var msg = document.getElementById('message').value;
            var chatroom = <?php echo $id_chat ?>;
            var user = <?php echo json_encode($_SESSION['user']['id']) ?>;
            var data = {
            message: msg,
                    user: user,
                    chatroom: chatroom,
                    mine: 0};
            ws.send(JSON.stringify(data));
                
        }
        </script>
</html>