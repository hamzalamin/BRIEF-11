<?php
include_once '../configuration/conection.php';

class User {
    // private $user_id;
    private $name;
    private $email;
    private $password;
    // private $role;

    public function __construct(/*$user_id,*/ $name, $email, $password/*, $role*/)
    {
        // $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        // $this->role = $role;
    }

    // public function getUserId(){
    //     return $this->user_id;
    // }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    // public function getRole(){
    //     return $this->role;
    // }
}
