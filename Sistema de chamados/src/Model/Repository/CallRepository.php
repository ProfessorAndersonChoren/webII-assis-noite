<?php

namespace QI\SistemaDeChamados\Model\Repository;

use PDO;
use QI\SistemaDeChamados\Model\Call;

class CallRepository{
    private $connection;

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

    /**
     * Insert a new call in database
     * @param Call $call
     * @return bool
     */
    public function insert($call){
        $stmt = $this->connection->prepare("insert into calls values (null,?,?,?,?,?);");
        $stmt->bindParam(1, $call->user->id);
        $stmt->bindParam(2, $call->equipment->id);
        $stmt->bindParam(3, $call->classification);
        $stmt->bindParam(4, $call->description);
        $stmt->bindParam(5, $call->notes);
        return $stmt->execute();
    }

    public function findAll(){
        $stmt = $this->connection->query("select c.*,u.name,u.email from calls c inner join users u on c.user_id = u.id;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $stmt = $this->connection->prepare("delete from calls where id=?");
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function findOne($id){
        $stmt = $this->connection->query("select c.id,c.equipment_id,c.description,c.notes,u.name,u.email,e.floor,e.room from calls c inner join users u on c.user_id = u.id inner join equipments e on c.equipment_id = e.id where c.id = $id;");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update a call in database
     * @param Call $call
     * @return bool
     */
    public function update($call){
        $stmt = $this->connection->prepare("update calls set classification = ?,notes = ?, description = ? where id = ?");
        $stmt->bindParam(1, $call->classification);
        $stmt->bindParam(2, $call->notes);
        $stmt->bindParam(3, $call->description);
        $stmt->bindParam(4, $call->id);
        return $stmt->execute();
    }
}