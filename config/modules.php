<?php

/**
 * Register application modules
 */
$application->registerModules(array(
    'session' => array(
        'className' => 'Wise\Session\Module',
        'path' => __DIR__ . '/../apps/session/Module.php'
    ),
    'profile' => array(
        'className' => 'Wise\Profile\Module',
        'path' => __DIR__ . '/../apps/profile/Module.php'
    )
));
