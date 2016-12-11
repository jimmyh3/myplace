<?php

/* 
 * Description of Message
 * 
 * @author Daniel
 * 
 */

class Message {
    // all defaults to 1 for testing purposes
    private $aid = 1;
    private $idMessages = 1;
    private $parent_id = 1;
    private $message_recipient = 1;
    private $message = "default";
    
    public function __construct($aid, $idMessages, $parent_id, $message_recipient, $message) {
        $this->aid = $aid;
        $this->idMessages = $idMessages;
        $this->parent_id = $parent_id;
        $this->message_recipient = $message_recipientl;
        $this->message = $message;
    }
    
    public function setAID($aid)
    {
        $this->aid = $aid;
    }
    
    public function getAID()
    {
        return $this->aid;
    }
    
    public function setIdMessages($idMessages)
    {
        $this->idMessages = $idMessages;
    }
    
    public function getIdMessages()
    {
        return $this->idMessages;
    }
    
    public function setParentID($parent_id)
    {
        $this->parent_id = $parent_id;
    }
    
        public function getParentID()
    {
        return $this->parent_id;
    }
    
    public function setMessageRecipient($message_recipient)
    {
        $this->message_recipient = $message_recipient;
    }
    
    public function getMessageRecipient()
    {
        $this->message_recipient;
    }     
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
