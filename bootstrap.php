<?php

use App\SQLiteConnection;

require 'vendor/autoload.php';
require 'db/Connection.php';
require 'db/QueryBuilder.php';


return new QueryBuilder(

    (new App\SQLiteConnection)->connect()
);
