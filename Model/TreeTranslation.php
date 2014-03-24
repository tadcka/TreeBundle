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

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:45 PM
 */
class TreeTranslation implements TreeTranslationInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var TreeInterface
     */
    protected $tree;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $title;

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

    /**
     * {@inheritdoc}
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }
}
