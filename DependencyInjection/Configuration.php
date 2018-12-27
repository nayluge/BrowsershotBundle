<?php

namespace Nayluge\BrowsershotBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nayluge_browsershot');

        $rootNode
            ->children()
                ->scalarNode('node_path')
                    ->defaultNull()
                ->end()
                ->scalarNode('npm_path')
                    ->defaultNull()
                ->end()
                ->scalarNode('chrome_path')
                    ->defaultNull()
                ->end()
                ->booleanNode('sandbox')
                    ->defaultFalse()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }

}
