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
 * @since 2/26/14 12:06 AM
 */
interface TreeItemInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set left.
     *
     * @param int $left
     *
     * @return TreeItemInterface
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
     * @return TreeItemInterface
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
     * @return TreeItemInterface
     */
    public function setRight($right);

    /**
     * Get right.
     *
     * @return int
     */
    public function getRight();

    /**
     * Set parent.
     *
     * @param TreeItemInterface $parent
     *
     * @return TreeItemInterface
     */
    public function setParent(TreeItemInterface $parent);

    /**
     * Get parent.
     *
     * @return TreeItemInterface
     */
    public function getParent();

    /**
     * Set children.
     *
     * @param array|TreeItemInterface[] $children
     *
     * @return TreeItemInterface
     */
    public function setChildren($children);

    /**
     * Get children.
     *
     * @return array|TreeItemInterface[]
     */
    public function getChildren();

    /**
     * Add child.
     *
     * @param TreeItemInterface $child
     */
    public function addChild(TreeItemInterface $child);

    /**
     * Remove child.
     *
     * @param TreeItemInterface $child
     */
    public function removeChild(TreeItemInterface $child);

    /**
     * Set translations.
     *
     * @param array|TreeItemTranslationInterface[] $translations
     *
     * @return TreeItemInterface
     */
    public function setTranslations($translations);

    /**
     * Get translations.
     *
     * @return array|TreeItemTranslationInterface[]
     */
    public function getTranslations();

    /**
     * Get translation.
     *
     * @param $lang
     *
     * @return null|TreeItemTranslationInterface
     */
    public function getTranslation($lang);

    /**
     * Add translation.
     *
     * @param TreeItemTranslationInterface $translation
     */
    public function addTranslation(TreeItemTranslationInterface $translation);

    /**
     * Remove translation.
     *
     * @param TreeItemTranslationInterface $translation
     */
    public function removeTranslation(TreeItemTranslationInterface $translation);

    /**
     * Set tree.
     *
     * @param TreeInterface $tree
     *
     * @return TreeItemInterface
     */
    public function setTree(TreeInterface $tree);

    /**
     * Get tree.
     *
     * @return TreeInterface
     */
    public function getTree();
}
 