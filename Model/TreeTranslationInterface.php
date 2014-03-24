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
 * @since 3/24/14 10:46 PM
 */
interface TreeTranslationInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set tree.
     *
     * @param TreeInterface $tree
     *
     * @return TreeTranslationInterface
     */
    public function setTree(TreeInterface $tree);

    /**
     * Get tree.
     *
     * @return TreeInterface
     */
    public function getTree();

    /**
     * Set lang.
     *
     * @param string $lang
     *
     * @return TreeTranslationInterface
     */
    public function setLang($lang);

    /**
     * Get lang.
     *
     * @return string
     */
    public function getLang();

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return TreeTranslationInterface
     */
    public function setTitle($title);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();
}
