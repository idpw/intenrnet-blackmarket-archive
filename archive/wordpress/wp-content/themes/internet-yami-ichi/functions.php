<?php
// register functions
$functions = glob(__DIR__ . '/functions/*.php');
foreach ($functions as $function) {
    require $function;
}
?>
