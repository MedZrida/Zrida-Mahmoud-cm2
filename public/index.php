<?php

session_start();

// Construct the base URL
$path = ($_SERVER['REQUEST_SCHEME'] ?? 'http') . "://" . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['PHP_SELF']);

// Define constants
define("ROOT", $path);            // Base URL
define("ASSETS", $path . "assets/");  // Path to assets
define("ROOT_PATH", "/BooksBazar.ca/");  // Adjust if needed

include "../app/init.php";

// Initialize the application
$app = new App();
