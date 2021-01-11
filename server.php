<?php

use Gingdev\Socket;
use Ratchet\Http\HttpServer;
use Ratchet\Http\OriginCheck;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';

$app = new OriginCheck(
    new WsServer(
        new Socket()
    ),
    ['localhost']
);

$app->allowedOrigins[] = getenv('DOMAIN');

$server = IoServer::factory(
    new HttpServer($app),
    getenv('PORT')
);

$server->run();
