<?php
require '../autoload.php';
$routes = new \src\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();