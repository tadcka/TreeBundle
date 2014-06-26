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
 * @since 6/24/14 9:12 PM
 */
interface NodeTypeRegistryInterface
{
    /**
     * Add type config.
     *
     * @param NodeTypeConfig $config
     */
    public function add(NodeTypeConfig $config);
}
