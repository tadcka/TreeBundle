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

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 2/26/14 12:06 AM
 */

/**
 * Class TreeItem
 *
 * @package Tadcka
 *
 * @Gedmo\Tree(type="nested")
 */
abstract class TreeItem implements TreeItemInterface
{
    /**
     * @var int
     */
    protected $id;

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
     * @var TreeItemInterface
     */
    protected $parent;

    /**
     * @var array|TreeItemInterface[]
     */
    protected $children;

    /**
     * @var array|TreeItemTranslationInterface[]
     */
    protected $translations;

    /**
     * @var TreeInterface
     */
    protected $tree;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->children = array();
        $this->translations = array();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setLeft($left)
    {
        $this->left = $left;
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

    /**
     * {@inheritdoc}
     */
    public function setParent(TreeItemInterface $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * {@inheritdoc}
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslation($lang)
    {
        foreach ($this->translations as $translation) {
            if ($lang === $translation->getLang()) {
                return $translation;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function setTree(TreeInterface $tree)
    {
        $this->tree = $tree;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTree()
    {
        return $this->tree;
    }
}
