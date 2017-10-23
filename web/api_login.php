<?php
require('vendor/autoload.php');
$client = new Everyman\Neo4j\Client('hobby-pahhjmlhedbegbkebhokjdpl.dbs.graphenedb.com', 24789);
$client->getTransport()
    ->setAuth('test101801', 'b.gDIKU5aLJ1bo.KYVbbtx1ug4YG1eW');
