<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Addon_chat.php';

$chat = new Addon_chat();

    $id_user = $_SESSION['user']['id'] = '11';
    $id_chat = $_SESSION['chat']['id'] = '13';
    $id_event = $_SESSION['event']['id'] = '32';

?>
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
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/index.php" class="btn-return">
                <img src="img/sign-out-option.svg" alt="return">
            </a>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/add-event.php" class="btn-add_event">
                <img src="img/add-event.svg" alt="">
            </a>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/deconnect.php" class="btn-off">
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
            <li>
                <a class="subheader one"><i class="material-icons orange-text text-darken-3">flash_on</i>Catégories</a>
            </li>
            <li><a class="waves-effect" href="#!">Sport</a></li>
            <li><a class="waves-effect" href="#!">Culture</a></li>
            <li><a class="waves-effect" href="#!">Divertissements</a></li>   
            <li><div class="divider"></div></li>
            <li>
                <a class="subheader two"><i class="material-icons purple-text text-darken-3">chat</i> Channels</a>
            </li>
            <li><a class="waves-effect chan-active" href="chat-staff.php">Annonces</a></li>
            <li><a class="waves-effect" href="chat.php">Discussions</a></li>
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
                <?php if(!empty($chat->is_event_admin($id_user, $id_event))){
                        echo '<a href="" class="trash">
                            <img src="img/delete.png" alt="delete">
                        </a>';
                }
                ?>
            </div>
            <section id="space-chat" class="space-chat">
                <div  class="reponse_ws">
                    
                    <?php 
            $nbr_chat = $chat->nbr_message($id_chat);
            $nbr_chat = $nbr_chat[COUNT(`message`)];
            
            $admin = $chat->is_event_admin($id_user, $id_event);
           
                if($nbr_chat > 0){
                    
                    $all_message = $chat->all_user_id_message($id_chat);
                   
                        foreach($all_message as $message){
                           $getmsg = $chat->message_of_user($message['id_messages']);
                           $id_message_user = $chat->get_iduser($message['id_messages']);
                           $firstname = $chat->firstname_name($id_message_user['id_user']);

                            echo '<div class="annonce-msg">';
                            echo '<h3>';
                            echo $firstname['firstname'] . ' '. $firstname['name'].'<br>';
                            echo '</h3>';
                            echo '<p>';
                            echo $getmsg['message'];
                            echo '</p>';
                            echo '</div>';
                        }
                }
            ?>
       
                </div>
            </section>
                <div class="message-container">
                    <div class="input-field col s12 message">
                        <input type="text" <?php if($admin['id_user'] != $id_user ) {echo 'disabled';} ?>  name="message" id="message" placeholder="<?php if($admin['id_user'] == $id_user) {echo 'ecrire son message';} ?>">


                    </div>   
                    <div class="col s12 message-send">
                        <button <?php if($admin['id_user'] != $id_user ) {echo 'disabled';} ?> class="btn waves-effect waves-light plane-send purple darken-3" onclick="submit()">
                            <i class="material-icons center">send</i>
                        </button>  
                    </div>
                </div>
           
        </div>
    </main>
    <footer>
        <a class="waves-effect waves-light btn modal-trigger orange darken-3" href="#modal1">Mes évènements</a>
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
<script>
            var ws = new WebSocket('ws://localhost:9000');
            console.log(ws);
            ws.onopen = function () {
                console.log('websocket is connected ...');
            }
        
            ws.onmessage = function (event) {
                console.log('test');
                    var msg = JSON.parse(event.data);
            console.log(msg);
            const scrolls = document.getElementById('reponse_ws');
            let newDiv = document.createElement('div');
               console.log('avant New_div');
                    newDiv.className = "sender";
                    newDiv.innerHTML = msg.firstname + ' ' + msg.name + "<br>" + msg.message;
                    scrolls.append(newDiv);
                
            element = document.getElementById('space-chat');
            element.scrollTop = element.scrollHeight;
            }

function submit() {
            var msg = document.getElementById('message').value;
            var chatroom = <?php echo $id_chat ?>;
            var user = <?php echo json_encode($_SESSION['user']['id']) ?>;
            var data = {
                event: 0,
            message: msg,
                    user: user,
                    chatroom: chatroom,
                    mine: 0};
                    console.log(data);
            ws.send(JSON.stringify(data));
                
        }

        $(".space-chat").animate({ scrollTop: $(this).height() }, "fast");
        </script>
</html>