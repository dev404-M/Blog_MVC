<?php

namespace Blog\Models;

use Blog\Models\User;

/** Class UserManager **/
class UserManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function find($username)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute(array(
            $username
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Blog\Models\User");

        return $stmt->fetch();
    }

    public function all()
    {
        $stmt = $this->bdd->query('SELECT * FROM user');

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Blog\Models\User");
    }

    public function store($password)
    {
        $stmt = $this->bdd->prepare("INSERT INTO user (id, username, password, date) VALUES (:id, :username, :password, :date)");
        $stmt->execute(array(
            "id" => uniqid(), 
            "username" => htmlentities($_POST["username"]),   
            "password" => htmlentities($password),    
            'date' => date('Y-m-d H:i:s'),
        ));
    }
}