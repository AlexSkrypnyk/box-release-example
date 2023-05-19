#!/usr/bin/env php

<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;

const JOKE_API_ENDPOINT = 'https://official-joke-api.appspot.com/jokes/%s/random';

function command(InputInterface $input, OutputInterface $output) {
  $topic = $input->getOption('topic');
  $jokeResponse = file_get_contents(sprintf(JOKE_API_ENDPOINT, $topic));
  [$joke] = json_decode($jokeResponse);

  $output->writeln($joke->setup);
  $output->writeln("<info>{$joke->punchline}</info>\n");
}

(new SingleCommandApplication())
  ->setName('Joke Fetcher')
  ->addOption(
    name: 'topic',
    mode: InputOption::VALUE_OPTIONAL,
    default: 'general'
  )
  ->setCode('command')
  ->run();
