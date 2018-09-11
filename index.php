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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Css/choice.css">
    <script rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">     
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
<div class="tinder">
            <div class="tinder--status">
          <i class="fa fa-remove"></i>
          <i class="fa fa-check"></i>
            </div>

<div class="tinder--cards">
          <div class="tinder--card">
            <img src="Assets/tsn.jpg">
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
          </div>
        </div>
        <div class="tinder--buttons">
          <button id="nope"><i class="fa fa-remove"></i></button>
          <button id="love"><i class="fa fa-check"></i></button>
        </div>
 </div>




            
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
    <script src="https://hammerjs.github.io/dist/hammer.js"></script>  
      <script type="text/javascript" src="js/slide.js"></script>
</html>