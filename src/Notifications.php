<?php
namespace Notifications;
 
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PDO;
 
class config {
    const SERVERNAME="localhost";
    const DBNAME="evender";
    const USER="root";
    const PASSWORD="";
}

class Notifications implements MessageComponentInterface
{
   
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection!\n";
    }

    
    public function onMessage(ConnectionInterface $from, $msg) {
       
        $json = json_decode($msg);
        
        var_dump($json);

      
  
           $db = new PDO("mysql:host=" . Config::SERVERNAME . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD);
    $sqa = $db->prepare("INSERT INTO `messages`(`content`, `proprietary`, `id_chatroom`) VALUES (:reponse, :login, :id_chatroom)");
    $sqa->bindParam(':reponse', $json->message);
    $sqa->bindParam(':login', $json->{'user'});
    $sqa->bindParam(':id_chatroom', $json->{'chatroom'});
    $sqa->execute();
   

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