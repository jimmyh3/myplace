<?php

require APP . 'libs/Message.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MessageDB {
    
    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function getMessages($aid, $user_id) {
        
        $sql = "SELECT * FROM Messages WHERE aid = " . $aid; 
        $sql .= " AND message_recipient = " . $user_id; 

        $query = $this->db->prepare($sql); 
        $query->execute(); 
        return $query->fetchAll(); 
    }
    
    //  made for test purposes to see all messages in database
    
    public function getAllMessages() {
        
        $sql = "SELECT * FROM Messages"; 

        $query = $this->db->prepare($sql); 
        $query->execute(); 
        return $query->fetchAll(); 
    }
    
    public function addMessage(Message $message) {
        
        $sql = " INSERT INTO Messages
                ( aid, idMessages, parent_id, message_recipient, message)
                VALUES
                ( :aid, :idMessages, :parent_id, :message_recipient, :message) ";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(array( "aid" => $message->getAID(),
                                        "idMessages" => $message->getIdMessages(),
                                        "parent_id" => $message->getParentID(),
                                        "message_recipient" => $message->getMessageRecipient(),
                                        "message" => $message->getMessage()));
        
    }
}
