<?php

use Gingdev\Socket;
use Gingdev\Wamp;
use Ratchet\App;
use Ratchet\Server\EchoServer;

require 'vendor/autoload.php';

$allow = ['localhost', getenv('DOMAIN')];

$server = new App('localhost', 3000);

$server->route('/wamp', new Wamp(), $allow);
$server->route('/echo', new EchoServer(), $allow);
$server->route('/socket', new Socket(), $allow);

$server->run();
