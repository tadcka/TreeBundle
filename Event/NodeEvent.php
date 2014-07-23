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
     * Constructor.
     *
     * @param NodeInterface $node
     */
    public function __construct(NodeInterface $node)
    {
        $this->node = $node;
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
}
