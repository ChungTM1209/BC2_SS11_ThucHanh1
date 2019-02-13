<?php
/**
 * Created by PhpStorm.
 * User: chungtran
 * Date: 12/02/2019
 * Time: 15:54
 */

namespace controller;

use model\Customer;
use model\CustomerDB;
use model\DBConnection;

class CustomerController
{
    public $customerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=customer", "ChungTM1209", "Vod@nh1209");
        $this->customerDB = new CustomerDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->create($customer);
            $message = 'Customer created';
            include 'view/add.php';
        }
    }
    public function index(){
        $customers = $this->customerDB->getAll();
        include 'view/list.php';
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->customerDB->delete($id);
            header('Location: index.php');
        }
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $customer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
            $this->customerDB->update($id, $customer);
            header('Location: index.php');
        }
    }
}
