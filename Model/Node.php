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

use Tadcka\Component\Tree\Model\Node as BaseNode;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 10:47 PM
 */
abstract class Node extends BaseNode implements NodeInterface
{
    /**
     * @Gedmo\TreeRoot
     *
     * @var int
     */
    protected $root;

    /**
     * @var int
     *
     * @Gedmo\TreeLeft
     */
    protected $left;

    /**
     * @var int
     *
     * @Gedmo\TreeLevel
     */
    protected $level;

    /**
     * @var int
     *
     * @Gedmo\TreeRight
     */
    protected $right;

    /**
     * {@inheritdoc}
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * {@inheritdoc}
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * {@inheritdoc}
     */
    public function setLevel($level)
    {
        $this->left = $level;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * {@inheritdoc}
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRight()
    {
        return $this->right;
    }
}
