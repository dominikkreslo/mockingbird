#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

    function doLogin($username,$password)
    {
        if(isset($_POST["name"], $_POST["password"]))
        {

            $name = $_POST["name"];
            $password = $_POST["password"];

            $result1 = mysqli_query("SELECT username, password FROM Users WHERE username = '".$name."' AND  password = '".$password."'");

            if(mysqli_num_rows($result1) > 0 )
            {
                $_SESSION["logged_in"] = true;
                $_SESSION["naam"] = $name;
            }
            else
            {
                echo 'The username or password are incorrect!';
            }
        }// lookup username in database
        // check password
        return true;
        //return false if not valid
    }

    function requestProcessor($request)
    {
      echo "received request".PHP_EOL;
      var_dump($request);
      if(!isset($request['type']))
      {
        return "ERROR: unsupported message type";
      }
      switch ($request['type'])
      {
        case "login":
          return doLogin($request['username'],$request['password']);
        case "validate_session":
          return doValidate($request['sessionId']);
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }

    $server = new rabbitMQServer("testRabbitMQ.ini","database");
    echo 'server started up';
    $server->process_requests('process');

    echo "testRabbitMQServer BEGIN".PHP_EOL;
    $server->process_requests('requestProcessor');
    echo "testRabbitMQServer END".PHP_EOL;
    exit();
    ?>

