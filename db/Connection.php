<?php


use App\SQLiteConnection;

class Connection
{
    public static function make()
    {
        $pdo = (new SQLiteConnection())->connect();
        //if ($pdo != null)
         //   echo 'Connected to the SQLite database successfully!';
        //else
          //  echo 'Whoops, could not connect to the SQLite database!';

    }

}

Connection::make();