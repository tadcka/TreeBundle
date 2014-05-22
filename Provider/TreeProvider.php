<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Provider;

use Tadcka\Bundle\SitemapBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/22/14 11:16 PM
 */
class TreeProvider
{
    /**
     * @var TreeManagerInterface
     */
    private $treeManager;

    /**
     * @var NodeManagerInterface
     */
    private $nodeManager;

    /**
     * Constructor.
     *
     * @param TreeManagerInterface $treeManager
     * @param NodeManagerInterface $nodeManager
     */
    public function __construct(TreeManagerInterface $treeManager, NodeManagerInterface $nodeManager)
    {
        $this->treeManager = $treeManager;
        $this->nodeManager = $nodeManager;
    }

    /**
     * Get list of trees.
     *
     * @param null|int $offset
     * @param null|int $limit
     *
     * @return array|NodeInterface[]
     */
    public function getListOfTrees($offset = null, $limit = null)
    {
        return $this->nodeManager->findRoots($this->treeManager->findManyRootIds($offset, $limit));
    }
}
