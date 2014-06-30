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
 * @since 4/2/14 10:48 PM
 */
interface NodeInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return NodeInterface
     */
    public function setType($type);

    /**
     * Get type.
     *
     * @return string
     */
    public function getType();

    /**
     * Set priority.
     *
     * @param int $priority
     *
     * @return NodeInterface
     */
    public function setPriority($priority);

    /**
     * Get priority.
     *
     * @return int
     */
    public function getPriority();

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

    /**
     * Set parent.
     *
     * @param NodeInterface $parent
     *
     * @return NodeInterface
     */
    public function setParent(NodeInterface $parent);

    /**
     * Get parent.
     *
     * @return NodeInterface
     */
    public function getParent();

    /**
     * Set children.
     *
     * @param array|NodeInterface[] $children
     *
     * @return NodeInterface
     */
    public function setChildren($children);

    /**
     * Get children.
     *
     * @return array|NodeInterface[]
     */
    public function getChildren();

    /**
     * Add child.
     *
     * @param NodeInterface $child
     */
    public function addChild(NodeInterface $child);

    /**
     * Remove child.
     *
     * @param NodeInterface $child
     */
    public function removeChild(NodeInterface $child);

    /**
     * Set translations.
     *
     * @param array|NodeTranslationInterface[] $translations
     *
     * @return NodeInterface
     */
    public function setTranslations($translations);

    /**
     * Get translations.
     *
     * @return array|NodeTranslationInterface[]
     */
    public function getTranslations();

    /**
     * Get translation.
     *
     * @param $lang
     *
     * @return null|NodeTranslationInterface
     */
    public function getTranslation($lang);

    /**
     * Add translation.
     *
     * @param NodeTranslationInterface $translation
     */
    public function addTranslation(NodeTranslationInterface $translation);

    /**
     * Remove translation.
     *
     * @param NodeTranslationInterface $translation
     */
    public function removeTranslation(NodeTranslationInterface $translation);
}
