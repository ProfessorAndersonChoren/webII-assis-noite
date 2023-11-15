<?php

namespace QI\SistemaDeChamados\Model;

class User{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($email){
        $this->email = $email;
    }
}