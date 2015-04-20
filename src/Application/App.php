<?php namespace Application;

use Symfony\Component\Console\Application;

use Application\Commands as Command;

class App{

    /**
     * @var Symfony Console Application
     */
    private $app;

    /**
     *
     * Init console app.
     *
     */
    function __construct(){
        $this->app = new Application();

        $this->app->add(new Command\NewsYandex());
        $this->app->add(new Command\NewsMail());
    }

    /**
     *
     * run console app
     *
     */
    function run(){
        if( php_sapi_name() == 'cli' ){

            $this->app->run();

        } else {

            echo "Browser's not supported!";

        }
    }
}

