<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Registry;

use Tadcka\Bundle\TreeBundle\ContextMenu\ContextMenuFactoryInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/29/14 10:51 PM
 */
class TreeConfig
{
    /**
     * Unique tree name.
     *
     * @var string.
     */
    private $name;

    /**
     * @var ContextMenuFactoryInterface
     */
    private $contextMenuFactory;

    /**
     * Constructor.
     *
     * @param string $name
     * @param ContextMenuFactoryInterface $contextMenuFactory
     */
    public function __construct($name, ContextMenuFactoryInterface $contextMenuFactory)
    {
        $this->name = $name;
        $this->contextMenuFactory = $contextMenuFactory;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get context menu factory.
     *
     * @return ContextMenuFactoryInterface
     */
    public function getContextMenuFactory()
    {
        return $this->contextMenuFactory;
    }
}
