<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Tests\Mock\ModelManager;

use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManager;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 8/26/14 10:36 PM
 */
class MockNodeManager extends NodeManager
{
    /**
     * @var array|NodeInterface[]
     */
    private $nodes = array();

    /**
     * {@inheritdoc}
     */
    public function findNode($nodeId)
    {
        foreach ($this->nodes as $node) {
            if ($nodeId === $node->getId()) {
                return $node;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function findRoot($rootId)
    {
        // TODO: Implement findRoot() method.
    }

    /**
     * {@inheritdoc}
     */
    public function findNodesByType($type)
    {
        // TODO: Implement findNodesByType() method.
    }

    /**
     * {@inheritdoc}
     */
    public function findRoots(array $rootIds)
    {
        // TODO: Implement findRoots() method.
    }

    /**
     * {@inheritdoc}
     */
    public function add(NodeInterface $node, $save = false)
    {
        $this->nodes[] = $node;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(NodeInterface $node, $save = false)
    {
        // TODO: Implement delete() method.
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        // TODO: Implement save() method.
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->nodes = array();
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return 'Tadcka\Bundle\TreeBundle\Tests\Mock\Model\MockNode';
    }
}
