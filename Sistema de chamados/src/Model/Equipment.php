<?php

namespace QI\SistemaDeChamados\Model;

class Equipment
{
    private $id;
    private $floor;
    private $room;

    public function __construct($id, $floor, $room)
    {
        $this->id = $id;
        $this->floor = $floor;
        $this->room = $room;
    }
}
