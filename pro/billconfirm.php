<?php
require_once 'navbar.php';
require_once 'connect.php';
if (!isset($_SESSION['user_id'])) {
    echo "Not logged in yet";
}

