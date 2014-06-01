<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:28 PM
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tadcka_tree');

        $rootNode
            ->children()
                ->scalarNode('db_driver')->cannotBeOverwritten()->isRequired()->end()
                ->scalarNode('tree_manager')->defaultValue('tadcka_tree.manager.tree.default')->cannotBeEmpty()->end()
                ->scalarNode('node_manager')->defaultValue('tadcka_tree.manager.node.default')->cannotBeEmpty()->end()
                ->scalarNode('node_translation_manager')->defaultValue('tadcka_tree.manager.node_translation.default')->cannotBeEmpty()->end()
                ->arrayNode('class')->isRequired()
                    ->children()
                        ->arrayNode('model')->isRequired()
                            ->children()
                                ->scalarNode('tree')->isRequired()->end()
                                ->scalarNode('node')->isRequired()->end()
                                ->scalarNode('node_translation')->isRequired()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
