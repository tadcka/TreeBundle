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
class TreeConfigContainer
{
    /**
     * @var array|TreeConfig[]
     */
    private $configs = array();

    /**
     * Add tree config.
     *
     * @param TreeConfig $config
     */
    public function add(TreeConfig $config)
    {
        $this->configs[$config->getName()] = $config;
    }

    /**
     * Get tree config.
     *
     * @param string $name
     *
     * @return TreeConfig|null
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->configs[$name];
        }

        return null;
    }

    /**
     * Check or has tree config by name.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->configs[$name]);
    }

    /**
     * All tree config.
     *
     * @return array|TreeConfig[]
     */
    public function all()
    {
        return $this->configs;
    }
}
