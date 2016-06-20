<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of order
 *
 * @author maxim_kabaev
 */
require_once 'database.php';

class Orders {

    protected $db;
    public $id;
    public $No;

    public function __construct(DB $db) {
        $this->db = $db;
    }

//    function getNo() {
//        return $this->No;
//    }
//
//    function setNo($No) {
//        $this->No = $No;
//    }

    public function CreateOrder($idClient) {
        //$this->db->printtest();

        $stmt = $this->db->conn->prepare('SELECT * FROM cls_boats WHERE id = :id');
        $id = 1;
        $stmt->execute(array('id' => $id));
        while ($row = $stmt->fetch()) {
            print_r($row);
        }
        return true;
    }

    public function GetOrder($idClient) {
        //$this->db->printtest();

        $stmt = $this->db->conn->prepare('SELECT * FROM cls_boats WHERE id = :id');
        $id = 1;
        $stmt->execute(array('id' => $id));
        while ($row = $stmt->fetch()) {
            print_r($row);
        }

        return $idClient;
    }
    ////public function connect($host, $user, $pass) {
    //    mysqli_connect($host, $user, $pass);
    //}
}
