<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\NodeType;

use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;
use Tadcka\Bundle\TreeBundle\NodeType\Registry\NodeTypeConfig;
use Tadcka\Bundle\TreeBundle\NodeType\Registry\NodeTypeRegistry;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/24/14 10:15 PM
 */
class NodeTypeManager
{
    /**
     * @var NodeTypeRegistry
     */
    private $registry;

    /**
     * @var NodeManagerInterface
     */
    private $nodeManager;

    /**
     * Constructor.
     *
     * @param NodeTypeRegistry $registry
     * @param NodeManagerInterface $nodeManager
     */
    public function __construct(NodeTypeRegistry $registry, NodeManagerInterface $nodeManager)
    {
        $this->registry = $registry;
        $this->nodeManager = $nodeManager;
    }

    /**
     * Validate node.
     *
     * @param NodeInterface $node
     *
     * @return bool
     */
    public function isValid(NodeInterface $node)
    {
        $config = $this->getConfig($node->getType());
        if ((null !== $config) && (null !== $parent = $node->getParent()) && $this->isOnlyOne($config, $node->getRoot())) {
            return $this->hasType($parent->getType(), $config->getParentTypes());
        }

        return false;
    }

    /**
     * Get node type config.
     *
     * @param string $nodeType
     *
     * @return null|NodeTypeConfig
     */
    public function getConfig($nodeType)
    {
        return $this->registry->getContainer()->get($nodeType);
    }

    /**
     * Get normalized types.
     *
     * @param int $root
     *
     * @return array
     */
    public function getNormalizedTypes($root)
    {
        $existingTypes = array();
        if (null !== $root) {
            $existingTypes = $this->nodeManager->findExistingNodeTypes($root);
        }

        $types = array();
        foreach ($this->registry->getContainer()->all() as $config) {
            if ((false === $config->isOnlyOne()) || (false === in_array($config->getSlug(), $existingTypes))) {
                $types[$config->getSlug()] = $config->getName();
            }
        }

        return $types;
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
        if ($this->isEmptyType($nodeType, $types)) {
            return true;
        }

        foreach ($types as $type) {
            if ($nodeType === $type) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check or is empty type.
     *
     * @param string $nodeType
     * @param array $types
     *
     * @return bool
     */
    private function isEmptyType($nodeType, array $types)
    {
        return (null === $nodeType) && (0 === count($types));
    }

    /**
     * Is only one.
     *
     * @param NodeTypeConfig $config
     * @param int $root
     *
     * @return bool
     */
    private function isOnlyOne(NodeTypeConfig $config, $root)
    {
        $existingTypes = array();
        if (null !== $root) {
            $existingTypes = $this->nodeManager->findExistingNodeTypes($root);
        }

        if ((false === $config->isOnlyOne()) || (false === in_array($config->getSlug(), $existingTypes))) {
            return true;
        }

        return false;
    }
}
