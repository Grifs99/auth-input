<?php
//TODO: check if folder is writable
//TODO: check if sqlite extension is aviable
include ("src/Database.php");
$db = new Database();
$db->createTables();
echo "Done!";