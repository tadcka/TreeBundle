<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/26/14 8:49 PM
 */
class NodeTypeRegistryPass implements CompilerPassInterface
{

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('tadcka_tree.registry.node_type')) {
            return;
        }

        $definition = $container->getDefinition('tadcka_tree.registry.node_type');

        $calls = $definition->getMethodCalls();
        $definition->setMethodCalls(array());
        foreach ($container->findTaggedServiceIds('tadcka_tree_node_type') as $id => $attributes) {
            $definition->addMethodCall('register', array(new Reference($id)));
        }
        $definition->setMethodCalls(array_merge($definition->getMethodCalls(), $calls));
    }
}
