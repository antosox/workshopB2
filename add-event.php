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
<head>
      <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">

      <title>Ajouter un évènement</title>
   </head>
   <body>
      <section class="add-event">
         <div class="container">
            <h1>Ajouter un évènement</h1>
            <form enctype="multipart/form-data" action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Modules/TraitementAddEvent.php" method="post">
               <p><img src="img/picture.svg" alt="picture-file" class="img-form-event"></p>
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
                  <input id="title_event" name="title_event" type="text" class="validate">
                  <label for="title_event" class="text-orange text-darken-3">Titre de l'évènement</label>
               </div>
               <div class="input-field col s6">
                  <select name="type">
                     <option value="" selected disabled>Type de l'évènement</option>
                     <option value="1">Culture</option>
                     <option value="2">Divertissement</option>
                     <option value="3">Sport</option>
                  </select>
               </div>
               <div class="input-field s6">
               <p><img src="img/clock.png" alt="clock" class="img-form-event"></p>
                  <input id="datepicker" name="date" type="text" class="datepicker" placeholder="Date">
               </div>
               <div class="input-field s6">     
               <input type="text" id="timepicker" name="time" class="timepicker" placeholder="Heure">
                  </div>
               </div>
               <p><img src="img/place.png" alt="place" class="img-form-event"></p>
               <div class="input-field s12">
                  <input type="text" name="address_event" id="address_event" placeholder="Adresse"> 
               </div>
               <div class="input-field col s12">
                  <input id="desc" name="desc" type="text" class="validate" placeholder="Description">
               </div>
               <button class="btn-small waves-effect waves-light" type="submit" name="action">Valider</button>           
            </form>
         </div>
      </section>
   </body>
   <script src="js/script.js"></script>
</html>