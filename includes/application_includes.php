<?php
// Include the basic configuration elements
require_once('config.php');
// Include the database connection and query class
require_once('database.php');

$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$requestType = $_SERVER[ 'REQUEST_METHOD' ];

session_start();