<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * DB Entity for Client
 *
 * @author maxim_kabaev
 */
Class ClientEntity {

    public $id;
    public $Name;
    public $Pasport;
    public $isOrg;
    public $Created;
    public $Phone;
    public $Comment;

}

/**
 * Mapper class for Client
 *
 * @author maxim_kabaev
 */
class ClientMapper {

    protected $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    /**
     * Convert Row from database to ClientEntity
     *
     * @author maxim_kabaev
     */
    private function RowToClientEntity($row) {
        $clientEntity = new ClientEntity;
        $clientEntity->id = $row['id'];
        $clientEntity->Name = $row['Name'];
        $clientEntity->Pasport = $row['Pasport'];
        $clientEntity->isOrg = $row['isOrg'];
        $clientEntity->Created = $row['Created'];
        $clientEntity->Phone = $row['Phone'];
        $clientEntity->Comment = $row['Comment'];
        return $clientEntity;
    }
    
    public function save(ClientEntity $client) {
        if (isset($client->id)) {
            $query = "UPDATE LOW_PRIORITY `cls_сlients` cс SET cс.Name=:name, cс.Pasport=:pasport, cс.isOrg=:isOrg, cс.Created=:created WHERE cс.id=" . $client->id;
        } else {
            $query = "INSERT LOW_PRIORITY INTO `cls_сlients` (`Name`, `Pasport`, `isOrg`, `Created`) VALUES (:name, :pasport, :isOrg, :created)";
        }
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(':name', $client->Name);
        $stmt->bindParam(':pasport', $client->Pasport);
        $stmt->bindParam(':isOrg', $client->isOrg);
        $stmt->bindParam(':created', $client->Created);
        $stmt->execute();
        $client->id = $this->db->conn->lastInsertId();
    }

    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM `cls_сlients` WHERE id=:id");
        $stmt->execute(array(':id' => $id));
    }

    public function getRowById($id) {
        $stmt = $this->db->conn->prepare('SELECT * FROM `cls_сlients` WHERE id=:id');
        $stmt->execute(array('id' => $id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getEntityById($id) {
        $row = $this->getRowById($id);
        $clientEntity = $this->RowToClientEntity($row);
        return $clientEntity;
    }

    public function getRows($filterCol, $filterStr) {
        $stmt = $this->db->conn->prepare("SELECT * FROM `cls_сlients` WHERE $filterCol LIKE :filter");
        $stmt->execute(array('filter' => $filterStr));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEntities($filterCol, $filterStr) {
        $rows = $this->getRows($filterCol, $filterStr);
        $entities = Array();
        foreach ($rows as $row) {
            $clientEntity = $this->RowToClientEntity($row);
            array_push($entities, $clientEntity);
        }
        return $entities;
    }

    public function getAllRows() {
        // load from Database where cateogory_id = 1
        $stmt = $this->db->conn->prepare('SELECT * FROM `cls_сlients`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllEntities() {
        $rows = $this->getAllRows();
        $entities = Array();
        foreach ($rows as $row) {
            $clientEntity = $this->RowToClientEntity($row);
            array_push($entities, $clientEntity);
        }
        return $entities;
    }

}
