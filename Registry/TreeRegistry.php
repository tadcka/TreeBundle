<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Registry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/29/14 10:52 PM
 */
class TreeRegistry implements TreeRegistryInterface
{
    /**
     * @var TreeConfigContainer
     */
    private $configs;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->configs = new TreeConfigContainer();
    }

    /**
     * Register tree config.
     *
     * @param TreeLoaderInterface $loader
     */
    public function register(TreeLoaderInterface $loader)
    {
        $loader->register($this);
    }

    /**
     * {@inheritdoc}
     */
    public function add(TreeConfig $config)
    {
        $this->configs->add($config);
    }

    /**
     * Get configs.
     *
     * @return TreeConfigContainer
     */
    public function getConfigs()
    {
        return $this->configs;
    }

}
