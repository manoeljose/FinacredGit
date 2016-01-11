#!/usr/bin/env php
<?php
// application.php

use Symfony\Bundle\FrameworkBundle\Console\Application;

require __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../app/bootstrap.php.cache';
require_once __DIR__ . '/../../../app/AppKernel.php';




$kernel = new AppKernel('dev', '0');
$application = new Application($kernel);
$application->add(new \FinacredBundle\CronTasks\CronTest());

$application->run();
