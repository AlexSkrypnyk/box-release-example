<?php
// src/app.php

use Drevops\App\Command\JokeCommand;
use Symfony\Component\Console\Application;
use Drevops\App\Command\SayHelloCommand;

$application = new Application();

$command = new JokeCommand();
$application->add($command);
$application->setDefaultCommand($command->getName());

$command = new SayHelloCommand();
$application->add($command);

$application->run();
