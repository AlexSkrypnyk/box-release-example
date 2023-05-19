<?php
// src/Command/SayHelloCommand.php

namespace Drevops\App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command {
  protected static $defaultName = 'app:say-hello';

  protected function configure(): void
  {
    $this
      ->setDescription('Says hello')
      ->setHelp('This command allows you to say hello...');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $output->writeln('Hello, Symfony console!');

    return Command::SUCCESS;
  }
}
