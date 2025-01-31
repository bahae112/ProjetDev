<?php
class Message
{
    private $id;
    private $msg;
    private $emetteur;
    private $date;


    public function __construct($id,  $msg,  $emetteur,  $date)
    {
        $this->id = $id;
        $this->msg = $msg;
        $this->emetteur = $emetteur;
        $this->date = $date;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function getEmetteur()
    {
        return $this->emetteur;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setMsg($msg): void
    {
        $this->msg = $msg;
    }

    public function setEmetteur($emetteur): void
    {
        $this->emetteur = $emetteur;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }
}
