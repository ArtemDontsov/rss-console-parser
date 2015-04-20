<?php namespace Application\Parser;

class ParserYandex extends Parser
{
    public function __construct()
    {
        $this->host   = 'http://news.yandex.ru/internet.rss';
    }
}