<?php
require_once __DIR__ . '/config/.db.php';
require_once __DIR__ . '/controllers/ProductsController.php';

$controller = new ProductsController();
$controller->index();