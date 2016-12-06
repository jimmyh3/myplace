<?php

class Msg extends Controller
{
       public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
  public function postPage()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    public function sendMsg()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function displayMsg()
    {
        $result ="";
        $messages = $this->apartment_db->getMessages(1, 1);
        $result .='<table class="table table-hover">
        <thead>
            <tr>
                <th>aid</th>
                <th>idMessages</th>
                <th>parent_id</th>
                <th>message_recipient</th>
                <th>message</th>
            </tr>
        </thead>
        <tbody>';
        foreach($messages as $message) {
            $result .= '<tr><td>'.htmlspecialchars($message->aid).'</td>';
            $result .= '<td>'.htmlspecialchars($message->idMessages).'</td>';
            $result .= '<td>'.htmlspecialchars($message->parent_id).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message_recipient).'</td>';
            $result .= '<td>'.htmlspecialchars($message->message).'</td></tr>';

        }
        $result .= '</tbody></table>';
        
        return $result;
    }
   
    
}

