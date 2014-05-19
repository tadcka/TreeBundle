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
 * @since 4/12/14 10:18 PM
 */
class Node
{
    /**
     * @var int
     *
     * @Type("integer")
     */
    private $id;


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
     * @param int $id
     * @param string $text
     * @param bool $children
     */
    public function __construct($id, $text, $children)
    {
        $this->id = $id;
        $this->text = $text;
        $this->children = $children;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
    public function getChildren()
    {
        return $this->children;
    }
}
