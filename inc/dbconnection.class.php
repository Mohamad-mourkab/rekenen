<?php
class Dbconnection extends PDO
{
    private $host = "localhost";
    private $dbname = "rekenen";
    private $user = "rekenen_user";
    private $pass = "cMSCAmMFXl.R[aTN";
    public function __construct()
    {
        parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname."; charset=utf8", $this->user, $this->pass);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}