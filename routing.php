<?php
include_once "./php/Router.php";

$route = new Route();

// Redirect
$route->add("/", "/");
$route->add("/search", "search.php");
$route->add("/search/{term}", "search.php");
$route->add("/seller/{id}", "verkaeufer-anzeigen.php");
$route->add("/article/{id}", "artikel-anzeigen.php");
$route->add("/article/{id}/stats", "artikel-statistiken.php");
$route->add("/cart", "cart.php");
$route->add("/cart/buy", "buy.php");
$route->add("/cart/buy/success", "buy-success.php");
$route->add("/account/settings", "nutzer-einstellungen.php");
$route->add("/sell", "verkaeufer-preise.php");
$route->add("/user/{id}/activity", "nutzer-aktivitaet.php");

$route->notFound("404.php");