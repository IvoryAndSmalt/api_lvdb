<?php

require('Models/Home.php');

if(isset($_GET['Film'])){
    $film = $_GET['Film'];
    $monFilm = afficherFilm($film);
    require('Views/HomeView.php');
}

