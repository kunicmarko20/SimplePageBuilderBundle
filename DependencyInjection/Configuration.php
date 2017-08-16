<?php

namespace KunicMarko\SimplePageBuilderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('simple_page_builder');
        $rootNode
            ->children()
            ->arrayNode('types')
            ->useAttributeAsKey('name')
            ->prototype('scalar')
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
