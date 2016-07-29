<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(array(
    'Wise\Plugins' =>  __DIR__ . '/../plugins/',
    'Wise\Library' =>  __DIR__ . '/../library/',
));



$loader->register();
