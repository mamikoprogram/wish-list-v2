<?php
require_once "../include/const.php";
require_once "../functions/db.php";
require_once "../functions/wish.php";

$dbh = db();
$wishs = wish_list($dbh);

include '../views/index.php';
