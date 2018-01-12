<?php


use RedBeanPHP\R;

class Db
{
    protected $host;
    protected $dbname;
    protected $username;
    protected $password;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    function connectDb()
    {
        R::setup( "mysql:host=$this->host;dbname=$this->dbname",
            "$this->username", "$this->password" );

        session_start();
    }

    function check()
    {
        if( !R::testConnection() )
        {
            exit('Error');
        }
    }
}