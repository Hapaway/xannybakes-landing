<?php
require 'vendor/autoload.php';
require 'app/funcs.php';

use Gum\Route as Gum;

Gum::get('/', function() {
  echo tpl('xannybakes');
});

// handle 404
if (Gum::not_found()) {
  header('HTTP/1.0 404 Not Found');
  echo '404 Not Found';
  exit;
}