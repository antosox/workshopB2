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

    public function new_message($id_user, $message, $id_chat, $id_event){

        $message = $this->db->prepare("INSERT INTO messages (`message`, `id_channel`, `id_user`, `id_event`) VALUES (:message, :id_channel, :id_user, :id_event)");
        $message->bindParam(':message', $message);
        $message->bindparam(':id_channel', $id_chat);
        $message->bindparam(':id_event', $id_event);
        $message->execute();
    
    }

    public function firstname_name($id_user){

        $name = $this->db->prepare("SELECT `firstname`, `name` FROM user WHERE `id_user` = '$id_user'");
        $name->execute();
        return $names = $name->fetchAll();
    }
//useless
    public function other_message($id_user, $id_chat){

        $message = $this->db->prepare("SELECT `message_user` FROM messages_users WHERE `id_chat` = :id_chat AND `id_user` <> '$id_user' ORDER BY id_message DESC");
        $message->bindparam(':id_chat', $id_chat);
        $message->execute();
        return $other_message = $message->fetchAll();
    }

    public function all_user_message($id_user, $id_chat){

        $message = $this->db->prepare("SELECT `message` FROM messages WHERE `id_channel` = :id_chat");
        $message->bindparam(':id_chat', $id_chat);
        $message->execute();
        return $user_message = $message->fetchAll();
    }

    public function nbr_message($id_chat){

        $nbr = $this->db->prepare("SELECT COUNT(`message`) FROM messages WHERE `id_channel` = :id_channel");
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
        
        $admin = $this->db->prepare("SELECT `id_user`, `id_event` FROM event_users WHERE `Admin` = '1'");
        $admin->bindparam(':id_event', $id_event);
        $admin->execute();
        return $is_admin = $admin->fetchAll();
    }

    public function event_name($id_event){

        $name = $this->db->prepare("SELECT `title` FROM event WHERE `id_event` = :id_event");
        $name->bindparam(':id_event', $id_event);
        $name->execute();
        return $title = $name->fetch();
    }

}
?>