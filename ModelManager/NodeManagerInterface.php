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

use Tadcka\Bundle\TreeBundle\Model\NodeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 11:05 PM
 */
interface NodeManagerInterface
{
    /**
     * Find node by id.
     *
     * @param int $nodeId
     *
     * @return NodeInterface|null
     */
    public function findNode($nodeId);

    /**
     * Find root.
     *
     * @param int $rootId
     *
     * @return NodeInterface|null
     */
    public function findRoot($rootId);

    /**
     * Find nodes by type.
     *
     * @param string $type
     *
     * @return array||NodeInterface[]
     */
    public function findNodesByType($type);

    /**
     * Find roots.
     *
     * @param array $rootIds
     *
     * @return array|NodeInterface[]
     */
    public function findRoots(array $rootIds);

    /**
     * Find existing node types.
     *
     * @param int $root
     *
     * @return array
     */
    public function findExistingNodeTypes($root);

    /**
     * Create node object.
     *
     * @return NodeInterface
     */
    public function create();

    /**
     * Add node object.
     *
     * @param NodeInterface $node
     * @param bool $save
     */
    public function add(NodeInterface $node, $save = false);

    /**
     * Delete node object.
     *
     * @param NodeInterface $node
     * @param bool $save
     */
    public function delete(NodeInterface $node, $save = false);

    /**
     * Save persistent layer.
     */
    public function save();

    /**
     * Remove node object from persistent layer.
     */
    public function clear();

    /**
     * Get node class name.
     *
     * @return string
     */
    public function getClass();
}
