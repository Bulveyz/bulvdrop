<?php
require 'vendor/autoload.php';
$f3 = require('vendor/bcosca/fatfree-core/base.php');

// Settings App
require 'app/config.php';

// Routes
require 'app/routes.php';

$f3->run();
