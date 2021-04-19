<?php


require 'vendor/autoload.php';
require 'db/Connection.php';
require 'App/VirtualMachine.php';
require 'db/QueryBuilder.php';



    $pdo = (new App\SQLiteConnection)->connect();

   $query =  new QueryBuilder($pdo);

   $serverData = $query->selectAll('VirtualMachine');




require 'index.view.php';

