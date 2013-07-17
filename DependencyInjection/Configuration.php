<?php

namespace Black\Bundle\LinkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('black_link');

        $supportedDrivers = array('mongodb', 'orm');

        $rootNode
            ->children()

                ->scalarNode('db_driver')
                    ->isRequired()
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                        ->thenInvalid('The database driver must be either \'mongodb\'.')
                    ->end()
                ->end()

                ->scalarNode('category_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('link_class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('category_manager')
                    ->defaultValue('Black\\Bundle\\LinkBundle\\Doctrine\\CategoryManager')
                ->end()
                ->scalarNode('link_manager')
                    ->defaultValue('Black\\Bundle\\LinkBundle\\Doctrine\\LinkManager')
                ->end()
            ->end();

        $this->addCategorySection($rootNode);
        $this->addLinkSection($rootNode);

        return $treeBuilder;
    }


    private function addCategorySection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('category')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('form')
                        ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('name')->defaultValue('black_link_category_form')->end()
                                ->scalarNode('type')
                                    ->defaultValue('Black\\Bundle\\LinkBundle\\Form\\Type\\CategoryType')
                                ->end()
                                ->scalarNode('handler')
                                    ->defaultValue('Black\\Bundle\\LinkBundle\\Form\\Handler\\CategoryFormHandler')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    private function addLinkSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('link')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('form')
                        ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('name')->defaultValue('black_link_link_form')->end()
                                ->scalarNode('type')
                                    ->defaultValue('Black\\Bundle\\LinkBundle\\Form\\Type\\LinkType')
                                ->end()
                                ->scalarNode('handler')
                                    ->defaultValue('Black\\Bundle\\LinkBundle\\Form\\Handler\\LinkFormHandler')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
