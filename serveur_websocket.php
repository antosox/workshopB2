<?php
/**
 * Socket avec Ratchet
 */
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Notifications\Notifications;
 
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/Notifications.php'; 
 

$server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Notifications()
            )
        ),
        9000
    );
 
$server->run();
