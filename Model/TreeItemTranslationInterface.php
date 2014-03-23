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
 * @since 2/26/14 1:01 AM
 */
interface TreeItemTranslationInterface
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId();

    /**
     * Set treeItem.
     *
     * @param TreeItemInterface $treeItem
     *
     * @return TreeItemTranslationInterface
     */
    public function setTreeItem(TreeItemInterface $treeItem);

    /**
     * Get treeItem.
     *
     * @return TreeItemInterface
     */
    public function getTreeItem();

    /**
     * Set lang.
     *
     * @param string $lang
     *
     * @return TreeItemTranslationInterface
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
     * @return TreeItemTranslationInterface
     */
    public function setTitle($title);

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return TreeItemTranslationInterface
     */
    public function setDescription($description);

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription();
}
