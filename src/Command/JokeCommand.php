<?php

namespace Drevops\App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class JokeCommand extends Command {

  const JOKE_API_ENDPOINT = 'https://official-joke-api.appspot.com/jokes/%s/random';

  protected static $defaultName = 'app:joke';

  protected function configure(): void {
    $this
      ->addOption(
        name: 'topic',
        mode: InputOption::VALUE_OPTIONAL,
        default: 'general'
      );
  }

  protected function execute(InputInterface $input, OutputInterface $output): int {
    $topic = $input->getOption('topic');
    $jokeResponse = file_get_contents(sprintf(self::JOKE_API_ENDPOINT, $topic));
    [$joke] = json_decode($jokeResponse);

    $output->writeln($joke->setup);
    $output->writeln("<info>{$joke->punchline}</info>\n");

    return Command::SUCCESS;
  }
}
