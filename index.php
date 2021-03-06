<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';
session_start();
if(empty($_SESSION['connected'])) {

    header('location: http://' . $_SERVER['HTTP_HOST'] . '/login.php');

}


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
    <script src="js/countdown.js"></script>   
    <title>Evender</title>
</head>
    <body>
        <header>
            <a href="#" class="btn-return">
                <img src="img/sign-out-option.svg" alt="return">
            </a>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/add-event.php" class="btn-add_event">
                <img src="img/add-event.svg" alt="">
            </a>
            <a href="http:<?php echo $_SERVER['HTTP_HOST'] ?>/deconnect.php" class="btn-off">
                <img src="img/disconnection.svg" alt="disconnection">
            </a>
            <div class="logo">
                <h1>
                    <img src="img/logo.svg" alt="Evender">
                </h1>
            </div>
        </header>
        <main>
            <div class="tinder" id="test">
            <div class="tinder--status">
                <i class="fa fa-remove"></i>
                <i class="fa fa-check"></i>
            </div>
            <div class="tinder--cards">
<?php
   
 $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
 $req = $db->prepare("SELECT * FROM event");
 $req->execute();
 $events = $req->fetchAll();

 foreach($events as $event) {
    
    $event['Date'] = date("d/m/y G:i", strtotime($event['Date']));

    $total = $db->prepare("SELECT COUNT(*) total FROM event_users where id_event = :id");
    $total->bindValue(':id', $event['id_event']);
    $total->execute();
    $nbr = $total->fetch();

    $admin = $db->prepare("SELECT u.id_user,u.firstname,u.name from event_users eu JOIN event e
    on e.id_event = eu.id_event
    JOIN user u
    on u.id_user = eu.id_user
    where eu.id_event = :id AND eu.Admin = :isadmin");
    $admin->bindValue(':id', $event['id_event'] );
    $admin->bindValue(':isadmin', 1);
    $admin->execute();
    $adm = $admin->fetch();

    echo '
          <div class="tinder--card">
            <img src="Assets/Events/'.$event['image'].'">
            <div class="infos">
                <h2>'.$event['title'].'</h2>
                <input id="id_event" type="hidden" value="'.$event['id_event'].'"> 
                <p>'.$event['Date'].'</p>
                <p>'.$event['local_event'].'</p>
            </div>
            <div class="nb-persons">
                <img src="img/nb-person.svg" alt="">
                <p>'.$nbr['total'].'</p>
            </div>
            <div class="admin-organizer">
                <p>'.$adm['firstname'].' '.$adm['name'].'</p>
            </div>
                <div class="medal-organizer">
                    <img src="img/medals/medal-wood.png" alt="medal-wood" class="medal">
                    <img src="img/medals/medal-ambiance.png" alt="medal-ambiance" class="medal">
                    <img src="img/medals/medal-price.png" alt="medal-price" class="medal" >
                    <img src="img/medals/medal-quality.png" alt="medal-quality" class="medal">
                </div>

                <div class="description">'.
                
                  $event['description'].
                '</div>
                <div class="countdown">
                    <div class="date deadline">2018-09-12 13:30:00.0000</div>
                    <div class="count"></div>
                </div>
                </div>';
 }
            ?>
        
 </div>     
 <div class="tinder--buttons">
          <button id="nope"><i class="fa fa-remove"></i></button>
          <button id="love" onclick="submit()"><i class="fa fa-check"></i></button>
        </div>
        </main>
        <footer>
            <a class="waves-effect waves-light btn modal-trigger purple darken-3" href="#modal1">Mes évènements</a>
              <!-- Modal Structure -->
            <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content">
                    <h4>Mes évènements</h4>
                    <table id="table_event" class="striped">
                        
                    <?php
                            $channels = $db->prepare("SELECT * From event_users eu join event e 
                            on eu.id_event = e.id_event where id_user = :iduser");
                            $channels->bindValue(':iduser', $_SESSION['user']['id']);
                            $channels->execute();
                            $participates = $channels->fetchAll();
                            foreach($participates as $participate) {
                                $id_event = $participate['id_event'];
                                $event = $db->prepare("SELECT id_channel from events_channels where id_event = '$id_event'");
                                $event->execute();
                                $id_channel = $event->fetchAll();
                            echo '
                            <tr class="event-row">
                            <td>
                                <h2 class="title-event">'.$participate['title'].'</h2>
                                <a href="chat-staff.php?id_channel='.$id_channel[0]['id_channel'].'" class="annonces">Annonces</a>
                                <a href="chat.php?id_channel='.$id_channel[1]['id_channel'].'" class="discuss">Discussion</a>
                                </td> 
                                </tr>';
                            }
                            ?>

                       
                       </table>
                </div>
            </div>
        </footer>
    </body>
    <script src="js/script.js"></script>
    <script src="https://hammerjs.github.io/dist/hammer.js"></script>  
    <script type="text/javascript" src="js/slide.js"></script>
    <script type="text/javascript">
        
        var dragged;

        function hello(){
            console.log("Saluuuuuuut");
        }

        document.addEventListener("drag", function( event ) {
            
        }, false);

        document.addEventListener("dragstart", function( event ) {
            // store a ref. on the dragged elem
            dragged = event.target;
            // make it half transparent
            event.target.style.opacity = .5;
        }, false);
      
        document.addEventListener("dragend", function( event ) {
            // reset the transparency
            event.target.style.opacity = 0;
            hello();
        }, false);
    
    </script>
<script>
console.log('test');
            var ws = new WebSocket('ws://localhost:9000');
            console.log(ws);
            ws.onopen = function () {
                console.log('websocket is connected ...');
            }
        
            ws.onmessage = function (event) {
                const tab = document.getElementById('table_event');
                newline = document.createElement('tr');
                var content = '<tr class="event-row"><td><h2 class="title-event">'+
                'WORKSHOP'+
                '</h2><a href="'+
                '#'+
                '" class="annonces">Annonces</a><a href="'+
                '#'+
                '" class="discuss">Discussion</a></td></tr>'
            newline.innerHTML = content;
            tab.append(newline);
            }

function submit() {
            console.log('test');
            var id_event = document.getElementById('id_event').value;
            var user = <?php echo json_encode($_SESSION['user']['id']) ?>;
            var data = {
            event: 1,
            message: id_event,
                    user: user};
            ws.send(JSON.stringify(data));         
        }

        var myElement = document.getElementById('test');

            var mc = new Hammer(myElement);

            //enable all directions
            mc.get('swipe').set({
            direction: Hammer.DIRECTION_ALL,
            threshold: 1, 
            velocity:0.1
            });

            // listen to events...
            mc.on("swiperight", function(ev) {
            submit();
            });

    </script>

</html>