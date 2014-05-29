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
interface TreeLoaderInterface
{
    /**
     * Load tree config and register it.
     *
     * @param TreeRegistryInterface $registry
     */
    public function register(TreeRegistryInterface $registry);
}
