<?php
    // DEV config file
    return CMap::mergeArray(
        require(dirname(__FILE__).'/main.php'),
        array(
            'components'=>array(
                'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=blog',
                    'emulatePrepare' => true,
                    'username' => 'user',
                    'password' => '',
                    'charset' => 'utf8',
                    // включаем профайлер
                    'enableProfiling'=>false,
                    // показываем значения параметров
                    'enableParamLogging' => false,
                ),
            ),
            'modules'=>array(
                'gii'=>array(
                    'class'=>'system.gii.GiiModule',
                    'password'=>'q1w2e3',
                    'ipFilters'=>array('127.0.0.1','::1'),
                ),
            ),
        )
    );