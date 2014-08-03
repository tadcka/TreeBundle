<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\Model\TreeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 7/23/14 11:24 PM
 */
class NodeEvent extends Event
{
    /**
     * @var NodeInterface
     */
    private $node;

    /**
     * @var TreeInterface
     */
    private $tree;

    /**
     * Constructor.
     *
     * @param NodeInterface $node
     * @param TreeInterface $tree
     */
    public function __construct(NodeInterface $node, TreeInterface $tree)
    {
        $this->node = $node;
        $this->tree = $tree;
    }

    /**
     * Get node.
     *
     * @return NodeInterface
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * Get tree.
     *
     * @return TreeInterface
     */
    public function getTree()
    {
        return $this->tree;
    }
}
