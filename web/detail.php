<?php
require('api_login.php');


$Username=$_COOKIE["PHPSESSID"];

$cypherStatement =
"MATCH (ho1:Hotel { name: 'ホテルコンコルド' })"
. "MATCH (us1:USER { name: '$Username' })"
. "CREATE (us1)-[:livedIn]->(ho1)";

$cypherQuery = new Everyman\Neo4j\Cypher\Query($client, $cypherStatement);
$resultSet = $cypherQuery->getResultSet();

echo($_COOKIE["PHPSESSID"]."<br/>\n");

/*
$personIndex = new \Everyman\Neo4j\NodeIndex($client, 'Hotel');
$match = $personIndex->findOne('name', 'ホテルコンコルド');

$HotelIndex = new Everyman\Neo4j\NodeIndex($client, 'Hotel');
$HotelIndex->add($HotelIndex, 'name', $HotelIndex->name);
$HotelIndex->save();
foreach ($match as $node) {
  echo ('名称 : ' . $node->getProperty('name'));

}


// ホテルノード取得
//$Hotellabel= $client->makelabel('Hotel');
$HotelProperty= $client->getProperty('name','ホテルコンコルド');
$Hotelnode= $HotelProperty->getNodes();



$Usernode->relateTo($Hotelnode, 'livedIn')
    ->save();*/
?>
