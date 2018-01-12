<?php


class TwigConnect
{
    public $template;
    public $derectory;
    public $templatedata = [];

    public function __construct($derectory, $template, $templatedata)
    {
        $this->derectory = $derectory;
        $this->template = $template;
        $this->templatedata = $templatedata;
    }

    function includeTwig()
    {
        $loader = new Twig_Loader_Filesystem("$this->derectory");
        $twig = new Twig_Environment($loader, array(
            'cache' => false,
        ));
        echo $twig->render("$this->template", $this->templatedata);
    }
}