<?php
$f3->set('AUTOLOAD', 'classes/site/; classes/addons/; classes/admin/');
$time_zone = $f3->get('TZ');
$ip = $f3->get('IP');
$platform = $f3->get('AGENT');
$time = $f3->get('TIME');
date_default_timezone_set($time_zone);


// DB Connect
$db = new Db('localhost', 'bulvdrop2', 'root', 'crfn131354');
$db->connectDb();






