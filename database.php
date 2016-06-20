<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'config.php';


class DB {

    public $conn;

    function __construct() {
        try {
            $this->conn = new PDO('mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USERNAME, DB_PASSWORD, array(
                PDO::ATTR_PERSISTENT => true
                    //PDO::ATTR_PERSISTENT => true - постоянное подключение, кэшируется
            ));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //public function printtest() {
    //    foreach ($this->dbh->query('SELECT * from cls_boats') as $row) {
    //        print_r($row);
    //    }
    //}

}

//try {
//    $dbh = new PDO('mysql:host='.DB_HOSTNAME.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
//    foreach($dbh->query('SELECT * from cls_boats') as $row) {
//        print_r($row);
//    }
//    $dbh = null;
//} catch (PDOException $e) {
//    print "Error!: " . $e->getMessage() . "<br/>";
//    die();
//}