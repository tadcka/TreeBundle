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

use Tadcka\Bundle\TreeBundle\Model\NodeTranslationInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/1/14 8:03 PM
 */
interface NodeTranslationManagerInterface
{
    /**
     * Create node translation.
     *
     * @return NodeTranslationInterface
     */
    public function create();

    /**
     * Add node translation to persistent layer.
     *
     * @param NodeTranslationInterface $translation
     * @param bool $save
     */
    public function add(NodeTranslationInterface $translation, $save = false);

    /**
     * Delete node translation from persistent layer.
     *
     * @param NodeTranslationInterface $translation
     * @param bool $save
     */
    public function delete(NodeTranslationInterface $translation, $save = false);

    /**
     * Save persistent layer.
     */
    public function save();

    /**
     * Clear node translation objects from persistent layer.
     */
    public function clear();

    /**
     * Get node translation class name.
     *
     * @return string
     */
    public function getClass();
}
