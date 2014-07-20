<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Tests\Mock\Model;

use Tadcka\Bundle\TreeBundle\Model\Node;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\Model\NodeTranslationInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 7/21/14 12:19 AM
 */
class MockNode extends Node
{
    /**
     * Add child.
     *
     * @param NodeInterface $child
     */
    public function addChild(NodeInterface $child)
    {
        // TODO: Implement addChild() method.
    }

    /**
     * {@inheritdoc}
     */
    public function removeChild(NodeInterface $child)
    {
        // TODO: Implement removeChild() method.
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(NodeTranslationInterface $translation)
    {
        // TODO: Implement addTranslation() method.
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(NodeTranslationInterface $translation)
    {
        // TODO: Implement removeTranslation() method.
    }
}
