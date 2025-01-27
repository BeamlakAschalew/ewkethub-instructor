<?php

$environment = $_SERVER['SERVER_NAME'];

if ($environment == 'localhost' || $environment == 'ewkethub-instructor.localhost')
    return [
        'database' => [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'ewkethub_test',
            'username' => 'root',
            'password' => ''
        ],
    ];
else
    return [
        'database' => [
            'host' => '91.204.209.13',
            'port' => 3306,
            'dbname' => 'beamlakdev_ewkethub_test',
            'username' => 'beamlakdev_ewkethub',
            'password' => 'ewkethubdbpassword'
        ],
    ];
