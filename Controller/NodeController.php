<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 11:11 PM
 */
class NodeController extends ContainerAware
{
    /**
     * @return NodeManagerInterface
     */
    private function getManager()
    {
        return $this->container->get('tadcka_tree.manager.node');
    }

    public function createAction()
    {
    }
}
