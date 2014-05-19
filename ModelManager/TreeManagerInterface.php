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

use Tadcka\Bundle\TreeBundle\Model\TreeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:21 PM
 */
interface TreeManagerInterface
{
    /**
     * Find tree by root id.
     *
     * @param int $rootId
     *
     * @return null|TreeInterface
     */
    public function findTreeByRootId($rootId);

    /**
     * Find many trees.
     *
     * @param null|int $offset
     * @param null|int $limit
     *
     * @return array|TreeInterface[]
     */
    public function findManyTrees($offset = null, $limit = null);

    /**
     * Get all tree count.
     *
     * @return int
     */
    public function count();

    /**
     * Create tree object.
     *
     * @return TreeInterface
     */
    public function create();

    /**
     * Add tree object.
     *
     * @param TreeInterface $tree
     * @param bool $save
     */
    public function add(TreeInterface $tree, $save = false);

    /**
     * Delete tree object.
     *
     * @param TreeInterface $tree
     * @param bool $save
     */
    public function delete(TreeInterface $tree, $save = false);

    /**
     * Save persistent layer.
     */
    public function save();

    /**
     * Remove tree object from persistent layer.
     */
    public function clear();

    /**
     * Get tree class name.
     *
     * @return string
     */
    public function getClass();
}
