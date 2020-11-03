#!/usr/bin/php
<?php

$users = new mysqli('127.0.0.1','testuser','12345','testMockingbird');

if ($users->errno != 0)
{
    echo "failed to connect to database: ". $users->error . PHP_EOL;
    exit(0);
}

echo "successfully connected to database".PHP_EOL;

$query = "select * from users;";

$response = $users->query($query);
if ($users->errno != 0)
{
    echo "failed to execute query:".PHP_EOL;
    echo __FILE__.':'.__LINE__.":error: ".$users->error.PHP_EOL;
    exit(0);
}


?>