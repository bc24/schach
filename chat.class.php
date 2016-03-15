<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 12.03.2016
 * Time: 11:43
 */

class chat {
    public $_sender;
    public $_empfaenger;
    public $_nachricht

    public function  __construct($empfaenger ,$sender)
    {
        $this->_empfaenger = $empfaenger;
        $this->_sender = $sender;
    }

    public function sendMessage($msg)
    {
        $db = new db();
        $res = $db->prepare("INSERT INTO chat (sender, empf, msg) VALUE (?,?,?))");
        $res->bindParam(1, $this->_sender);
        $res->bindParam(2, $this->_empfaenger);
        $res->bindParam(3, $msg);
        $res->execute();
    }

    public function readMessage()
    {
        $db = new db();
        $res = $db->prepare("SELECT * FROM chat WHERE sender = ? AND empf = ? ORDER BY id DESC");
        $res->bindParam(1, $this->_sender);
        $res->bindParam(2, $this->_empfaenger);
        $res->execute();

        return $res->fetchAll();
    }
}