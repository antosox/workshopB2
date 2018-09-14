<?php
namespace Notifications;
 
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use PDO;

 
class config {
    const SERVERNAME="127.0.0.1";
    const DBNAME="evender";
    const USER="root";
    const PASSWORD="";
}

class Notifications implements MessageComponentInterface
{
   
    protected $clients;
    protected $db;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection!\n";
    }

    
    public function onMessage(ConnectionInterface $from, $msg) {
       
        $json = json_decode($msg);
        
        var_dump($json);
        if($json->event == 0){
        $message = $this->db->prepare("INSERT INTO messages (`message`) VALUES (:message)");
        $message->bindParam(':message', $json->message);
        $message->execute();
        $id_message = $this->db->lastInsertId();

        $user_message = $this->db->prepare("INSERT INTO user_messages (`id_user`, `id_messages`) VALUES ($json->user, $id_message)");
        $user_message->execute();

        $message_channel = $this->db->prepare("INSERT INTO messages_channels (`id_channel`, `id_messages`) VALUES (:id_channel, $id_message)");
        $message_channel->bindparam(':id_channel', $json->chatroom);
        $message_channel->execute();

        $name = $this->db->prepare("SELECT `firstname`, `name` FROM user WHERE `id_user` = '$json->user'");
        $name->execute();
        $names = $name->fetch();

        $json->firstname = $names['firstname'];
        $json->name = $names['name'];
        var_dump($json);

    foreach ($this->clients as $client) {
            if ($from !== $client) {
                $json->{'mine'}=0;
                $msg=json_encode($json);
                echo('send du msg mine = 0');
                // The sender is not the receiver, send to each client connected
                 $client->send($msg);
    }else{
    $json->{'mine'}=1;
        $msg=json_encode($json);
        $client->send($msg);
        }
        
    }
    }else{
        echo('debut else');
        //insert l'event
        $user_event = $this->db->prepare("INSERT INTO event_users (`id_event`, `id_user`) VALUES (:id_event, $json->user)");
        $user_event->bindparam(':id_event', $json->event);
        $user_event->execute();
        //return l'id de l'event et l'id de ses chats et le nom de l'event
        $data_event = $this->db->prepare("SELECT `id_channel`, `title` FROM event JOIN events_channels ON event.`id_event`=events_channels.`id_event` WHERE event.`id_event` = :id_event");
        $data_event->bindparam(':id_event', $json->event);
        $data_event->execute();
        $event = $data_event->fetchAll();
        var_dump($event);
    }
echo('fin du web socket');
}
    public function onClose(ConnectionInterface $conn) {
        echo "Connection has disconnected\n";
    }
     
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
         
        $conn->close();
    }
}