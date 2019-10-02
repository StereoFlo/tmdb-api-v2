<?php

use TMDB\Credentials;
use TMDB\TMDB;

include 'vendor/autoload.php';

$tmdb = new TMDB();
$credentials = new Credentials('YOU_API_KEY');
$section = new \TMDB\Section\Movies\MovieDetails(null, [429203]);
$tmdb->setCredentials($credentials)->setSection($section)->setLanguage('ru');

var_dump($tmdb->get());
