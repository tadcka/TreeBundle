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

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/1/14 8:03 PM
 */
abstract class NodeTranslationManager implements NodeTranslationManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $className = $this->getClass();
        $translation = new $className;

        return $translation;
    }
}
