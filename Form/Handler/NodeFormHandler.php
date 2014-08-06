<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/19/14 11:41 PM
 */
class NodeFormHandler
{
    /**
     * @var NodeManagerInterface
     */
    private $nodeManager;

    /**
     * @var TreeManagerInterface
     */
    private $treeManager;

    /**
     * Constructor.
     *
     * @param NodeManagerInterface $nodeManager
     * @param TreeManagerInterface $treeManager
     */
    public function __construct(NodeManagerInterface $nodeManager, TreeManagerInterface $treeManager)
    {
        $this->nodeManager = $nodeManager;
        $this->treeManager = $treeManager;
    }

    /**
     * Process node form.
     *
     * @param Request $request
     * @param FormInterface $form
     *
     * @return bool
     */
    public function process(Request $request, FormInterface $form)
    {
        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $this->nodeManager->add($form->getData());

                return true;
            }
        }

        return false;
    }

    /**
     * On success.
     *
     * @param NodeInterface $node
     */
    public function createTree(NodeInterface $node)
    {
        if (null === $node->getParent()) {
            $tree = $this->treeManager->findTreeByRootId($node->getRoot());
            if (null === $tree) {
                $tree = $this->treeManager->create();
                $tree->setRootId($node->getRoot());
                $tree->setSlug($tree->getCreatedAt()->getTimestamp());
            }

            $this->treeManager->add($tree, true);
        }
    }
}
