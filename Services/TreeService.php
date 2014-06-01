<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Services;

use Tadcka\Bundle\TreeBundle\Registry\TreeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/1/14 7:35 PM
 */
class TreeService
{
    /**
     * @var TreeRegistry
     */
    private $registry;

    /**
     * Constructor.
     *
     * @param TreeRegistry $registry
     */
    public function __construct(TreeRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function getTree($name)
    {
        if ($this->registry->getConfigs()->has($name)) {

        }

        return null;
    }
}
