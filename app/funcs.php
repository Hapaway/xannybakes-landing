<?php

function tpl($file_name, $vars = array()) {
  $file = 'app/views/' . $file_name . '.html';
  return render($file, $vars);
}

function render($file, $vars = array()) {
  extract($vars);
  ob_start();
  include $file;
  $out = ob_get_contents();
  ob_end_clean();
  return $out; 
}
