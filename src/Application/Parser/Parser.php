<?php namespace Application\Parser;

use Buzz\Client\FileGetContents;
use Buzz\Message\Request;
use Buzz\Message\Response;

use \DOMDocument;
use \DOMXPath;

abstract class Parser
{
    protected $method = 'GET';
    protected $host;

    public function getNews()
    {
        $xml = $this->getData();

        $doc = new DOMDocument();
        $doc->loadXML($xml);

        $xpath = new DOMXpath($doc);
        $items = $xpath->query('.//item');

        $news = array();
        foreach ($items as $item) {
            $news[] = array(
                'datetime' => $xpath->evaluate("./pubDate", $item)->item(0)->nodeValue,
				//f****g windows cmd encoding...
                'title' => iconv("UTF-8", "cp866", $xpath->evaluate("./title", $item)->item(0)->nodeValue)
            );
        }

        return $news;
    }


    protected function getData()
    {
        $request  = new Request($this->method, '', $this->host);
        $response = new Response();
        $client   = new FileGetContents();

        try {

            $client->send($request, $response);

            $data = $response->getContent();

        } catch (\Exception $e) {

            throw new \Exception('Network error');

        }

        return $data;
    }

}