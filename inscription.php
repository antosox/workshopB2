<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="Css/modal.css">
    <link rel="stylesheet" href="Css/main.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">     
    <title>Inscription Evender</title>
</head>

<body>
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
    <div id="login-wrapper" class="inscription container">
        <div class="row alignement">
            <h4>Inscription</h4>
            <div class="col s12">
                <form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Modules/TraitementInscription.php" method="POST">
                    <table class="infoprofil">
                        <tbody>
                            <tr>
                                <i class="material-icons">account_box</i>
                                <td>
                                    <div class="input-field col s12">
                                        <input name="nom" id="nom" type="text" class="validate" placeholder="Nom">
                                    </div>
                                </td>
                                <td>
                                    <div class="input-field col s12">
                                        <input name="prenom" id="prenom" type="text" class="validate" placeholder="Prénom">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input-field">
                                        <i class="material-icons">location_city</i>
                                        <input type="search" id="city" name="ville" class="form-control" placeholder="Ville"/>
                                        <script src="https://cdn.jsdelivr.net/npm/places.js@1.10.0"></script>
                                        <script>
                                        (function() {
                                        var placesAutocomplete = places({
                                            container: document.querySelector('#city'),
                                            type: 'city',
                                            aroundLatLngViaIP: false,
                                            templates: {
                                            value: function(suggestion) {
                                                return suggestion.name;
                                            }
                                            } 
                                        });
                                        })();
                                        </script>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="material-icons">mail</i>
                                    <input id="mail" name="email" type="email" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <td>Mot de Passe</td>
                                <td>
                                    <input id="password" name="password1" type="password" class="validate">
                                </td>
                            </tr>
                            <tr>
                                <td>Confirmation</td>
                                <td>
                                    <input id="password" name="password2" type="password" class="validate">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="ins_submit_btn" class="btn purple darken-3" type="submit">valider</button>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/login.php" id="ins_canc_btn" class="ml-1 btn red">annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>