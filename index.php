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
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Oswald:700" rel="stylesheet"> 
    <title>Evender</title>
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
            <section class="event">
                <img src="img/events/bowling.jpg" alt="event" class="illustration">
                <div class="infos">
                    <h2>Bowling</h2>
                    <p>12/09/2018</p>
                    <p>Nantes</p>
                </div>
                <div class="nb-persons">
                    <img src="img/nb-person.svg" alt="">
                    <p>8</p>
                </div>
                <div class="admin-organizer">
                    <p>Alexis</p>
                </div>
                <div class="medal-organizer">
                    <img src="img/medals/medal-wood.png" alt="medal-wood" class="medal" >
                    <img src="img/medals/medal-ambiance.png" alt="medal-ambiance" class="medal" >
                    <img src="img/medals/medal-price.png" alt="medal-price" class="medal" >
                    <img src="img/medals/medal-quality.png" alt="medal-quality" class="medal" >
                </div>
                <div class="description">
                    <p>Quis enim aut eum diligat quem metuat, aut eum a quo se metui putet? Coluntur tamen simulatione dumtaxat ad tempus.</p>
                </div>
            </section>
            <section>
                <button class="validate btn-flat">
                    <img src="img/validate.svg" alt="validate">
                </button>
                <button class="eject btn-flat">
                    <img src="img/eject.svg" alt="eject">
                </button>
            </section>
        </main>
        <footer>
            <a class="waves-effect waves-light btn modal-trigger purple darken-3" href="#modal1">Mes évènements</a>
              <!-- Modal Structure -->
            <div id="modal1" class="modal bottom-sheet">
                <div class="modal-content">
                    <h4>Modal Header</h4>
                    <p>A bunch of text</p>
                </div>
            </div>
        </footer>
    </body>
    <script src="js/script.js"></script>
</html>