<?php

namespace ICS\WebsearchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {

        $treeBuilder = new TreeBuilder('websearch');
        $treeBuilder->getRootNode()->children()
            ->booleanNode('safesearch')->defaultValue(true)->end();

        return $treeBuilder;
    }
}
