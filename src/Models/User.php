<?php

namespace Blog\Models;

/** Class User **/
class User
{
    private $id;
    private $username;
    private $password;
    private $date;

    public function getId() 
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getDate(){
        return $this->date;
    }


   public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setDate($date){
        $this->date = $date;
    }

    
}