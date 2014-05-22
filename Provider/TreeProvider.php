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
use Tadcka\Bundle\TreeBundle\Model\TreeInterface;
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
        $rootIds = $this->getRootIds($this->treeManager->findManyTrees($offset, $limit));
        $roots = $this->nodeManager->findRoots(array_values($rootIds));

        $data = array();
        foreach ($roots as $root) {
            foreach ($rootIds as $slug => $rootId) {
                if ($root->getRoot() === $rootId) {
                    $data[$slug] = $root;
                    break;
                }
            }
        }

        return $data;
    }

    /**
     * Get root ids.
     *
     * @param array|TreeInterface[] $trees
     *
     * @return array
     */
    private function getRootIds(array $trees)
    {
        $rootIds = array();
        foreach ($trees as $tree) {
            $rootIds[$tree->getSlug()] = $tree->getRootId();
        }

        return $rootIds;
    }
}
