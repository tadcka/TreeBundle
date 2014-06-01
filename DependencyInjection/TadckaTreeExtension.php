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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:28 PM
 */
class TadckaTreeExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('form/node.xml');
        $loader->load('registry.xml');

        if (!in_array(strtolower($config['db_driver']), array('mongodb', 'orm'))) {
            throw new \InvalidArgumentException(sprintf('Invalid db driver "%s".', $config['db_driver']));
        }
        $loader->load('driver/' . sprintf('%s.xml', $config['db_driver']));

        $container->setParameter('tadcka_tree.model.tree.class', $config['class']['model']['tree']);
        $container->setParameter('tadcka_tree.model.node.class', $config['class']['model']['node']);
        $container->setParameter(
            'tadcka_tree.model.node_translation.class',
            $config['class']['model']['node_translation']
        );

        $container->setAlias('tadcka_tree.manager.tree', $config['tree_manager']);
        $container->setAlias('tadcka_tree.manager.node', $config['node_manager']);
        $container->setAlias('tadcka_tree.manager.node_translation', $config['node_translation_manager']);
    }
}
