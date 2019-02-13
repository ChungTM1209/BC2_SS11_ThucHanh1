<?php
/**
 * Created by PhpStorm.
 * User: chungtran
 * Date: 12/02/2019
 * Time: 15:19
 */

namespace model;

use PDO;

class DBConnection
{
    public $dsn;
    public $userName;
    public $passWord;

    public function __construct($dsn, $userName, $passWord)
    {
        $this->dsn = $dsn;
        $this->userName = $userName;
        $this->passWord = $passWord;
    }

    public function connect()
    {
        return new PDO($this->dsn, $this->userName, $this->passWord);
    }
}