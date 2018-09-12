<?php
namespace Notifications;
 
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PDO;

include_once '../Addon_chat.php';

 
class config {
    const SERVERNAME="localhost";
    const DBNAME="evender";
    const USER="root";
    const PASSWORD="";
}

class Notifications implements MessageComponentInterface
{
   
    protected $clients;
    private $chat;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->$chat = new Addon_chat();
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection!\n";
    }

    
    public function onMessage(ConnectionInterface $from, $msg) {
       
        $json = json_decode($msg);
        
        var_dump($json);

      
   

    foreach ($this->clients as $client) {
            if ($from !== $client) {
                $json->{'mine'}=0;
                $msg=json_encode($json);
                // The sender is not the receiver, send to each client connected
                 $client->send($msg);
    }else{
    $json->{'mine'}=1;
        $msg=json_encode($json);
        $client->send($msg);
        }
        
    }
    }
     
    public function onClose(ConnectionInterface $conn) {
        echo "Connection has disconnected\n";
    }
     
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
         
        $conn->close();
    }
}