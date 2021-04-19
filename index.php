<?php

$query = require 'bootstrap.php';

require 'App/VirtualMachine.php';




    $pdo = (new App\SQLiteConnection)->connect();

    $query =  new QueryBuilder($pdo);

    $addData = $query->addServerInfo('VirtualMachine');

    //$serverData = $query->selectAll('VirtualMachine');




require 'index.view.php';

