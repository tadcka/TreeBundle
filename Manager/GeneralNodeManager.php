<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Manager;

use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\Model\NodeTranslationInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeTranslationManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 6/1/14 8:21 PM
 */
class GeneralNodeManager
{
    /**
     * @var NodeManagerInterface
     */
    private $nodeManager;

    /**
     * @var NodeTranslationManagerInterface
     */
    private $translationManager;

    /**
     * Constructor.
     *
     * @param NodeManagerInterface $nodeManager
     * @param NodeTranslationManagerInterface $translationManager
     */
    public function __construct(NodeManagerInterface $nodeManager, NodeTranslationManagerInterface $translationManager)
    {
        $this->nodeManager = $nodeManager;
        $this->translationManager = $translationManager;
    }

    /**
     * Create node.
     *
     * @param string $title
     * @param string $locale
     *
     * @return NodeInterface
     */
    public function create($title, $locale)
    {
        $node = $this->nodeManager->create();
        $translation = $this->createTranslation($title, $locale);
        $translation->setNode($node);
        $node->addTranslation($translation);
        $this->nodeManager->add($node);

        return $node;
    }

    /**
     * Create node translation.
     *
     * @param string $title
     * @param string $locale
     *
     * @return NodeTranslationInterface
     */
    public function createTranslation($title, $locale)
    {
        $translation = $this->translationManager->create();
        $translation->setLang($locale);
        $translation->setTitle($title);
        $this->translationManager->add($translation);

        return $translation;
    }

    /**
     * Get many node root.
     *
     * @param array $rootIds
     *
     * @return array|NodeInterface[]
     */
    public function getManyNodeRoot(array $rootIds)
    {
        return $this->nodeManager->findRoots($rootIds);
    }
}
