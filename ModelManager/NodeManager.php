<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\ModelManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 11:05 PM
 */
abstract class NodeManager implements NodeManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $className = $this->getClass();
        $node = new $className;

        return $node;
    }
}
