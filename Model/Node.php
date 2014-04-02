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
 * @since 4/2/14 10:47 PM
 */

/**
 * Class Node
 *
 * @package Tadcka\Bundle\TreeBundle\Model
 */
abstract class Node implements NodeInterface
{
    /**
     * @var int
     */
    protected $id;

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
     * @var NodeInterface
     */
    protected $parent;

    /**
     * @var array|NodeInterface[]
     */
    protected $children;

    /**
     * @var array|NodeTranslationInterface[]
     */
    protected $translations;

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

    /**
     * {@inheritdoc}
     */
    public function setParent(NodeInterface $parent)
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
}
