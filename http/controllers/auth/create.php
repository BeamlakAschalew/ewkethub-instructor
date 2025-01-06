<?php

$data = $_POST;

require_once base_path("Core/Database.php");

use Core\Database;

$config = require base_path("essentials/config.php");
$database = new Database($config["database"]);
