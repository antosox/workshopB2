<!DOCTYPE html>
<html lang="fr">
   <head>
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
      <title>Ajouter un évènement</title>
   </head>
   <body>
      <section class="add-event">
        <div class="container">
            <h1>Ajouter un évènement</h1>
            <form enctype="multipart/form-data" action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Modules/TraitementAddEvent.php" method="post">
                <p>
                    <img src="img/picture.svg" alt="place" class="img-form-event">
                </p>
                <div class="file-field">
                  <div class="btn-small orange darken-3">
                     <span>Image</span>
                     <input type="file" name="EventImage"/>
                  </div>
                  <div class="file-path-wrapper">
                     <input class="file-path validate" type="text">
                  </div>
                </div>
                <div class="input-field col s6">
                  <input id="title_event" name="title_event" type="text" class="validate" placeholder="Titre de l'évènement">
                </div>
                <div class="input-field col s6">
                  <select name="type">
                     <option value="" selected disabled>Type de l'évènement</option>
                     <option value="1">Culture</option>
                     <option value="2">Divertissement</option>
                     <option value="3">Sport</option>
                  </select>
                </div>
                <p>
                    <img src="img/clock.png" alt="clock" class="img-form-event">
                </p>
                <div class="input-field col s6">
                  <input id="datepicker" name="date" type="text" class="datepicker" placeholder="Date">
                </div>
                <div class="input-field col s6">     
                     <input type="text" id="timepicker" name="time" class="timepicker" placeholder="Heure">
                </div>
                <p>
                    <img src="img/place.png" alt="place" class="img-form-event">
                </p>
                <div class="input-field col s6">
                  <input type="text" name="address_event" id="address_event" placeholder="Adresse"> 
               </div>
               <p>
                 <i class="material-icons img-form-event">library_books</i>
               </p>
               <div class="input-field col s6">
                  <input id="desc" name="desc" type="text" class="validate" placeholder="Description">
               </div>
               <div class="input-field col s6">
                    <button class="btn-small waves-effect waves-light" type="submit" name="action">Valider</button>           
               </div>
            </form>
        </div>
      </section>
   </body>
   <script src="js/script.js"></script>
</html>