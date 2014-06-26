<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\SitemapBundle\Type;

use Tadcka\Bundle\SitemapBundle\Type\Registry\TypeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/24/14 10:15 PM
 */
class NodeTypeManager
{
    /**
     * @var TypeRegistry
     */
    private $registry;

    /**
     * Constructor.
     *
     * @param TypeRegistry $registry
     */
    public function __construct(TypeRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Validate node and parent types.
     *
     * @param string $nodeType
     * @param string $parentType
     *
     * @return bool
     */
    public function isValid($nodeType, $parentType)
    {
        if (null !== $config = $this->registry->getContainer()->get($nodeType)) {
            return $this->hasType($parentType, $config->getParentTypes());
        }

        return false;
    }

    /**
     * Check or has node type in type list.
     *
     * @param string $nodeType
     * @param array $types
     *
     * @return bool
     */
    private function hasType($nodeType, array $types)
    {
        foreach ($types as $type) {
            if ($nodeType === $type) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get normalized types.
     *
     * @return array
     */
    public function getNormalizedTypes()
    {
        $types = array();

        foreach ($this->registry->getContainer()->all() as $config) {
            $types[$config->getSlug()] = $config->getName();
        }

        return $types;
    }
}
