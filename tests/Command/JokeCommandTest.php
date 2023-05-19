<?php

namespace Drevops\App\Tests\Command;

use Drevops\App\Command\JokeCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class JokeCommandTest extends TestCase {
  public function testExecute() {
    $application = new Application();
    $application->add(new JokeCommand());

    $command = $application->find('app:joke');
    $commandTester = new CommandTester($command);

    $commandTester->execute(['--topic' => 'general']);

    // the output of the command in the console
    $output = $commandTester->getDisplay();
    $this->assertStringContainsString('Setup', $output);
    $this->assertStringContainsString('Punchline', $output);
  }
}

// Override the file_get_contents function in the JokeCommand namespace
namespace Drevops\App\Command;

function file_get_contents($url) {
  // Fake a successful joke response
  return json_encode([[
    "setup" => "Setup",
    "punchline" => "Punchline",
  ]]);
}
