<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$server = new rabbitMQServer("rabbitMQ.ini", "database");
echo "server started up";
$server->process_requests('process');

function sendRabbit($data, $server){
    $client = new rabbitMQClient("rabbitMQ.ini",$server);
    $response = $client->send_request($data);
    return $response;
}

echo "client recieved response: ".PHP_EQL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EQL;
?>
