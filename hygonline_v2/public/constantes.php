<?php 
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV',
              (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'developpement'));

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(__DIR__ . '/../src'));

defined('ASSETS_URL')
    || define('ASSETS_URL', (APPLICATION_ENV == 'developpement' ? '/hygonline_v2/public/assets' : '/assets'));