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

use Tadcka\Bundle\TreeBundle\Manager\GeneralNodeManager;
use Tadcka\Bundle\TreeBundle\Model\TreeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManagerInterface;
use Tadcka\Bundle\TreeBundle\Registry\TreeConfig;
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
     * @var TreeManagerInterface
     */
    private $treeManager;

    /**
     * @var GeneralNodeManager
     */
    private $generalNodeManager;

    /**
     * Constructor.
     *
     * @param TreeRegistry $registry
     * @param TreeManagerInterface $treeManager
     * @param GeneralNodeManager $generalNodeManager
     */
    public function __construct(TreeRegistry $registry, TreeManagerInterface $treeManager, GeneralNodeManager $generalNodeManager)
    {
        $this->registry = $registry;
        $this->treeManager = $treeManager;
        $this->generalNodeManager = $generalNodeManager;
    }

    /**
     * Get tree.
     *
     * @param string $name
     * @param string $locale
     * @param bool $synchronize
     *
     * @return null|TreeInterface
     */
    public function getTree($name, $locale, $synchronize = false)
    {
        if ($this->registry->getConfigs()->has($name)) {
            if ($synchronize) {
                $this->synchronizeWithDatabase($locale);
                $this->treeManager->save();
            }

            return $this->treeManager->findTreeBySlug($name);
        }

        return null;
    }

    /**
     * Synchronize register tree with database.
     *
     * @param string $locale
     */
    private function synchronizeWithDatabase($locale)
    {
        $trees = $this->treeManager->findManyTreeBySlugs($this->getManyTreeNames());

        $this->addTrees($trees, $locale);
        $this->removeTrees($trees, $locale);

        $roots = $this->getRoots($trees);
        foreach ($this->generalNodeManager->getManyNodeRoot(array_keys($roots)) as $root) {
            if (null === $root->getTranslation($locale)) {
                $this->generalNodeManager->createTranslation($roots[$root->getRoot()], $locale);
            }
        }
    }

    /**
     * Add trees.
     *
     * @param array|TreeInterface[] $trees
     * @param string $locale
     */
    private function addTrees(array $trees, $locale)
    {
        foreach ($this->registry->getConfigs()->all() as $config) {
            $exist = false;
            foreach ($trees as $tree) {
                if ($config->getName() === $tree->getSlug()) {
                    $exist = true;

                    break;
                }
            }

            if (false === $exist) {
                $node = $this->generalNodeManager->create($config->getName(), $locale);
                $this->treeManager->save();

                $tree = $this->createNewTree($config);
                $tree->setRootId($node->getRoot());
            }
        }
    }

    /**
     * TODO: check whether you really need
     */
    private function removeTrees(array $trees, $locale)
    {

    }

    /**
     * Create new tree.
     *
     * @param TreeConfig $config
     *
     * @return TreeInterface
     */
    private function createNewTree(TreeConfig $config)
    {
        $tree = $this->treeManager->create();
        $tree->setSlug($config->getName());

        $this->treeManager->add($tree);

        return $tree;
    }

    /**
     * Get many tree names.
     *
     * @return array
     */
    private function getManyTreeNames()
    {
        $slugs = array();
        foreach ($this->registry->getConfigs()->all() as $config) {
            $slugs[$config->getName()] = $config->getName();
        }

        return array_values($slugs);
    }

    /**
     * Get roots.
     *
     * @param array|TreeInterface[] $trees
     *
     * @return array
     */
    private function getRoots(array $trees)
    {
        $rootIds = array();
        foreach ($trees as $tree) {
            $rootIds[$tree->getRootId()] = $tree->getSlug();
        }

        return $rootIds;
    }
}
