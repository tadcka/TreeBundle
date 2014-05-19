<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Frontend\Model;

use JMS\Serializer\Annotation\Type;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/12/14 10:23 PM
 */
class Root
{
    /**
     * @var string
     *
     * @Type("string")
     */
    private $text;

    /**
     * @var bool
     *
     * @Type("boolean")
     */
    private $children;

    /**
     * Constructor.
     *
     * @param string $text
     * @param boolean $children
     */
    public function __construct($text, $children)
    {
        $this->text = $text;
        $this->children = $children;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get children.
     *
     * @return bool
     */
    public function hasChildren()
    {
        return $this->children;
    }
}
