<?php

use Gingdev\Socket;
use Ratchet\Http\HttpServer;
use Ratchet\Http\OriginCheck;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';

$wsServer = new WsServer(new Socket());

$checkedApp = new OriginCheck($ws, ['localhost']);

$checkedApp->allowedOrigins[] = getenv('DOMAIN');

$server = IoServer::factory(
    new HttpServer($checkedApp),
    getenv('PORT')
);

$wsServer->enableKeepAlive($server->loop, 30);

$server->run();
