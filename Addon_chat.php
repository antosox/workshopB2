<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Includes/config.php';

class Addon_chat {
    
    private $db;

    public function __construct() {
         $this->db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    }

    public function delete_event($id_event){
        
        $delete = $this->db->prepare("DELETE FROM `event` WHERE id_event = '$id_event'");
        $delete->execute();
    }

    public function new_message($id_user, $message, $id_chat){

        $message = $this->db->prepare("INSERT INTO messages (`message`) VALUES (:message)");
        $message->bindParam(':message', $message);
        $message->execute();
        $id_message = $this->db->lastInsertId();

        $user_message = $this->db->prepare("INSERT INTO user_messages (`id_user`, `id_message`) VALUES ($id_user, $id_message)");
        $user_message->execute();

        $message_channel = $this->db->prepare("INSERT INTO messages_channels (`id_channel`, `id_message`) VALUES (:id_channel, $id_message)");
        $message_channel->bindparam(':id_channel', $id_chat);
        $message_channel->execute();
    
    }

    public function firstname_name($id_user){

        $name = $this->db->prepare("SELECT `firstname`, `name` FROM user WHERE `id_user` = '$id_user'");
        $name->execute();
        return $names = $name->fetch();
    }
//useless
    public function other_message($id_user, $id_chat){

        $message = $this->db->prepare("SELECT `message_user` FROM messages_users WHERE `id_chat` = :id_chat AND `id_user` <> '$id_user' ORDER BY id_message DESC");
        $message->bindparam(':id_chat', $id_chat);
        $message->execute();
        return $other_message = $message->fetchAll();
    }

    public function all_user_id_message($id_chat){
        var_dump($id_chat);
        $msg = $this->db->prepare("SELECT `id_messages` FROM messages_channels WHERE `id_channel` = :id_chat ORDER BY `id_messages`");
        $msg->bindparam(':id_chat', $id_chat);
        $msg->execute();
        return $id_message = $msg->fetchAll();
    }

    public function message_of_user($id_message){

        $message = $this->db->prepare("SELECT `message` FROM messages WHERE `id_message` = $id_message");
        $message->execute();
        return $user_message = $message->fetch();
    }

    public function get_date_event($id_event){

        $eventdate = $this->db->prepare("SELECT `Date` FROM event WHERE `id_event` = $id_event");
        $eventdate->execute();
        return $event_date = $eventdate->fetch();
    }

    public function nbr_message($id_chat){


        $nbr = $this->db->prepare("SELECT COUNT(`id_messages`) FROM messages_channels WHERE `id_channel` = :id_channel");
        $nbr->bindparam(':id_channel', $id_chat);
        $nbr->execute();
        return $nbr_message = $nbr->fetch();
    }

    public function staff_new_message($id_chat, $message, $id_user, $id_event){

        $message = $this->db->prepare("INSERT INTO messages (`message`, `id_user`, `id_channel`, `id_event`) VALUES (:message, :id_chat, :id_user, :id_event)");
        $message->bindparam(':id_chat', $id_chat);
        $message->bindparam(':message', $message);
        $message->bindparam(':id_event', $id_event);
        $message->execute();

    }

    public function is_actual_user($id_event, $id_user){

        $user = $this->db->prepare("SELECT `id_event`, `id_user` FROM event WHERE `id_event` = :id_event AND `id_user` = '$id_user'");
        $user->bindparam(':id_event', $id_event);
        $user->execute();
        return $is_user = $user->fetchAll();
    }

    public function is_event_admin($id_user, $id_event){
        
        $admin = $this->db->prepare("SELECT `id_user`, `id_event` FROM event_users WHERE `Admin` = '1' AND id_event = :id_event");
        $admin->bindparam(':id_event', $id_event);
        $admin->execute();
        return $is_admin = $admin->fetch();
    }

    public function event_name($id_event){

        $name = $this->db->prepare("SELECT `title` FROM event WHERE `id_event` = :id_event");
        $name->bindparam(':id_event', $id_event);
        $name->execute();
        return $title = $name->fetch();
    }


    public function get_iduser($id_message){

        $user = $this->db->prepare("SELECT `id_user` FROM `user_messages` where `id_messages` = :idmsg ");
        $user->bindparam(':idmsg', $id_message);
        $user->execute();
        return $id = $user->fetch();
    }


}
?>