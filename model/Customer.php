<?php
/**
 * Created by PhpStorm.
 * User: chungtran
 * Date: 12/02/2019
 * Time: 15:24
 */

namespace model;


class Customer
{
    public $id;
    public $name;
    public $email;
    public $address;

    public function __construct($name, $email, $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }
}