<?php
// tests/Command/SayHelloCommandTest.php

namespace Drevops\App\Tests\Command;

use Drevops\App\Command\SayHelloCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class SayHelloCommandTest extends TestCase {
  public function testExecute() {
    $application = new Application();
    $application->add(new SayHelloCommand());

    $command = $application->find('app:say-hello');
    $commandTester = new CommandTester($command);

    $commandTester->execute([]);

    // the output of the command in the console
    $output = $commandTester->getDisplay();
    $this->assertStringContainsString('Hello, Symfony console!', $output);
  }
}
