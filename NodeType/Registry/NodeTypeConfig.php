<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\NodeType\Registry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/24/14 9:00 PM
 */
class NodeTypeConfig
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $iconPath;

    /**
     * @var array
     */
    private $parentTypes = array();

    /**
     * @var bool
     */
    private $isOnlyOne;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $slug
     * @param string $iconPath
     * @param array $parentTypes
     * @param bool $isOnlyOne
     */
    public function __construct($name, $slug, $iconPath, array $parentTypes = array(), $isOnlyOne = false)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->parentTypes = $parentTypes;
        $this->iconPath = $iconPath;
        $this->isOnlyOne = $isOnlyOne;
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
     * Get slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get icon path.
     *
     * @return string
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }

    /**
     * Get parentTypes.
     *
     * @return array
     */
    public function getParentTypes()
    {
        return $this->parentTypes;
    }

    /**
     * Is only one.
     *
     * @return bool
     */
    public function isOnlyOne()
    {
        return $this->isOnlyOne;
    }
}
