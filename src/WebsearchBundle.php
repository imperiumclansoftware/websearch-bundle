<?php
namespace ICS\WebsearchBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class WebsearchBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {

    }

    public function getPath(): string
    {

        return \dirname(__DIR__);
    }

}
