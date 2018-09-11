<?php

namespace evender;

use config;

class Chat {

    public $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

    public function delete_event($id_event){

        $delete = $this->db->prepare("DELETE FROM `event` WHERE id_event = '$id_event'");
        $delete->execute();
    }

    public function new_message($id_user, $message, $id_chat){

        $message = $this->db->prepare("INSERT INTO messages_users (`message_user`, `id_chat`, `id_user`) VALUES (:message, :id_chat, :id_user)");
        $message->bindParam(':message', $message);
                ->bindparam(':id_chat', $id_chat);
        $message->execute();
    
    }

    public function firstname_name($id_user){

        $name = $this->db->prepare("SELECT `firstname`, `name` FROM user WHERE `id_user` = '$id_user'");
        $name->execute();
        return $names = $name->fetchAll();
    }

    public function other_message($id_user, $id_chat){

        $message = $this->db->prepare("SELECT `message_user` FROM messages_users WHERE `id_chat` = :id_chat AND `id_user` <> '$id_user'");
        $message->bindparam(':id_chat', $id_chat);
        $message->execute();
        return $other_message = $message->fetchAll();
    }

    public function user_message($id_user, $id_chat){

        $message = $this->db->prepare("SELECT `message_user` FROM messages_users WHERE `id_chat` = :id_chat AND `id_user` = '$id_user'");
        $message->bindparam(':id_chat', $id_chat);
        $message->execute();
        return $user_message = $message->fetchAll();
    }

    public function nbr_message($id_chat){

        $nbr = $this->db->prepare("SELECT COUNT(`message_user`) FROM messages_users WHERE `id_chat` = :id_chat");
        $nbr->bindparam(':id_chat', $id_chat);
        $nbr->execute();
        return $nbr_message = $nbr->fetchAll();
    }

    public function staff_new_message($id_chat, $message, $id_user){

        $message = $this->db->prepare("INSERT INTO messages_staff (`message_staff`, `id_admin`, `id_channel`) VALUES (:message, :id_chat, :id_user)");
        $message->bindparam(':id_chat', $id_chat);
                ->bindparam(':message', $message);
        $message->execute();

    }
    
    public function is_event_user($id_event, $id_user){

        $user = $this->db->prepare("SELECT `id_event`, `id_user` FROM event WHERE `id_event` = :id_event AND `id_user` = '$id_user'");
        $user->bindparam(':id_event', $id_event);
        $user->execute();
        return $is_user = $user->fetchAll();
    }

    public function is_event_admin($id_chat, $id_user, $id_event){

        $admin = $this->db->prepare("SELECT `id_channel`, `id_admin`, `id_event` FROM staff WHERE `id_channel` = :id_chat, `id_admin` = $id_user, `id_event` = :id_event");
        $admin->bindparam(':id_chat', $id_chat);
              ->bindparam(':id_event', $id_event);
        $admin->execute();
        return $is_admin = $admin->fetchAll();
    
    }

}
?>