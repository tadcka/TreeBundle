<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\NodeType\Registry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/24/14 9:02 PM
 */
class NodeTypeRegistry implements NodeTypeRegistryInterface
{
    /**
     * @var NodeTypeContainer
     */
    private $container;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->container = new NodeTypeContainer();
    }

    /**
     * Register node type loader.
     *
     * @param NodeTypeLoaderInterface $loader
     */
    public function register(NodeTypeLoaderInterface $loader)
    {
        $loader->register($this);
    }

    /**
     * {@inheritdoc}
     */
    public function add(NodeTypeConfig $config)
    {
        $this->container->add($config);
    }

    /**
     * Get config container.
     *
     * @return NodeTypeContainer
     */
    public function getContainer()
    {
        return $this->container;
    }
}
