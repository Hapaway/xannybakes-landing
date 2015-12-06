<?php
require 'vendor/autoload.php';
require 'app/funcs.php';

use Gum\Route as Gum;

Gum::get('/', function() {
  echo tpl('xannybakes', array(
    'csrf'=>\Volnix\CSRF\CSRF::getHiddenInputString()
  ));
});

Gum::post('/contact', function() {
  $mandrill = new Mandrill(''); // @TODO: get from env var

  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $body = htmlspecialchars($_POST['body']);
  
  $message = array(
    'text' => $body,
    'subject' => 'Someone contacted you via your website!',
    'from_email' => $email,
    'from_name' => $name,
    'to' => array(
      array(
        'email' => 'dev@staydecent.ca',
        'name' => 'Adrian Unger',
        'type' => 'to'
      )
    )
  );

  $result = $mandrill->messages->send($message);
  print_r($result);
});

// handle 404
if (Gum::not_found()) {
  header('HTTP/1.0 404 Not Found');
  echo '404 Not Found';
  exit;
}