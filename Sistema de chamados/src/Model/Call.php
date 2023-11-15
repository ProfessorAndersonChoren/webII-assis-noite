<?php

namespace QI\SistemaDeChamados\Model;
class Call{
    private $id;
    private $user;
    private $equipment;
    private $classification;
    private $description;
    private $notes;

    public function __construct($user,$equipment,$classification,$description){
        $this->user = $user;
        $this->equipment = $equipment;
        $this->classification = $classification;
        $this->description = $description;
    }
}