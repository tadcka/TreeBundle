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
 * @since 6/24/14 9:04 PM
 */
class NodeTypeContainer
{
    /**
     * @var array|NodeTypeConfig[]
     */
    private $container = array();

    /**
     * Set many configs.
     *
     * @param array|NodeTypeConfig[] $configs
     */
    public function set(array $configs)
    {
        $this->container = array();
        foreach ($configs as $config) {
            $this->container[$config->getSlug()] = $config;
        }
    }

    /**
     * Get config by slug.
     *
     * @param string $slug
     *
     * @return null|NodeTypeConfig
     */
    public function get($slug)
    {
        if ($this->has($slug)) {
            return $this->container[$slug];
        }

        return null;
    }

    /**
     * Add config to container.
     *
     * @param NodeTypeConfig $config
     */
    public function add(NodeTypeConfig $config)
    {
        $this->container[$config->getSlug()] = $config;
    }

    /**
     * Delete config by slug.
     *
     * @param string $slug
     */
    public function delete($slug)
    {
        if ($this->has($slug)) {
            unset($this->container[$slug]);
        }
    }

    /**
     * Check or has config by slug.
     *
     * @param string $slug
     *
     * @return bool
     */
    public function has($slug)
    {
        return isset($this->container[$slug]);
    }

    /**
     * Get all register configs.
     *
     * @return array|NodeTypeConfig[]
     */
    public function all()
    {
        return $this->container;
    }
}
