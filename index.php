<?php

$query = require 'bootstrap.php';

require 'App/VirtualMachine.php';




    $pdo = (new App\SQLiteConnection)->connect();

    $query =  new QueryBuilder($pdo);

    $queryAll = $query->selectAll('VirtualMachine');

    //$serverData = $query->selectAll('VirtualMachine');




require 'index.view.php';

