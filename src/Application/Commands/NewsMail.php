<?php namespace Application\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Application\Parser as Parsers;

class NewsMail extends Command {

    protected function configure()
    {
        $this
            ->setName("mail")
            ->setDescription("Parsing news from mail rss")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = new Parsers\ParserMail();
        $news = $parser->getNews();

        foreach ($news as $item) {
            $output->writeln(sprintf("<info>[%s]</info> <comment>%s</comment>", $item['datetime'], $item['title']));
        }
    }
}

