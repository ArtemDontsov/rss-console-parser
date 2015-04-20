<?php namespace Application\Parser;

class ParserMail extends Parser
{
    public function __construct()
    {
        $this->host   = 'https://news.mail.ru/rss/54/';
    }
}