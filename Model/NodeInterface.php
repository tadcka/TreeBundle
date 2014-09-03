<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Model;

use Tadcka\Component\Tree\Model\NodeInterface as BaseNodeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 10:48 PM
 */
interface NodeInterface extends BaseNodeInterface
{
    /**
     * Set root.
     *
     * @param int $root
     *
     * @return NodeInterface
     */
    public function setRoot($root);

    /**
     * Get root.
     *
     * @return int
     */
    public function getRoot();

    /**
     * Set left.
     *
     * @param int $left
     *
     * @return NodeInterface
     */
    public function setLeft($left);

    /**
     * Get left.
     *
     * @return int
     */
    public function getLeft();

    /**
     * Set level.
     *
     * @param int $level
     *
     * @return NodeInterface
     */
    public function setLevel($level);

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel();

    /**
     * Set right.
     *
     * @param int $right
     *
     * @return NodeInterface
     */
    public function setRight($right);

    /**
     * Get right.
     *
     * @return int
     */
    public function getRight();
}
