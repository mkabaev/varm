<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ALL);
//require_once 'database.php';
require_once 'Orders.php';
require_once 'Clients.php';

$db = new DB();


//// create new client
//$clientMapper = new ClientMapper($db);
//$client=new ClientEntity();
//$client->Name='Кабаев Максим Сергеевич';
//$client->Pasport='3606 525597';
//$client->isOrg=false;
//$client->Created=date('Y-m-d H:i:s');
//$clientMapper->save($client);
//echo '<br/>ID'.$client->id;

//// get client
//$clientMapper = new ClientMapper($db);
//$client=$clientMapper->getEntityById(6);
//echo $client->Name;
//print_r($client);

//// delete client
//$clientMapper = new ClientMapper($db);
//$clientMapper->delete(1);


//$clientMapper = new ClientMapper($db);
//$clients = $clientMapper->getAllEntities();
//echo "<pre>";
//print_r($clients);

//foreach ($clients as $client) {
//    echo "<h3>" . $client->Name . "</h3>";
//}

//$clientMapper = new ClientMapper($db);
//$clients = $clientMapper->getEntities("Name", "%Ал%");
//foreach ($clients as $client) {
//    echo "<h3>" . $client->Name . "</h3>";
//}