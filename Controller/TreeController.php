<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Tadcka\Bundle\TreeBundle\Form\Factory\NodeFormFactory;
use Tadcka\Bundle\TreeBundle\Form\Handler\NodeFormHandler;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManagerInterface;
use Tadcka\Bundle\TreeBundle\Provider\TreeProvider;
use Tadcka\Component\Paginator\Pagination;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:15 PM
 */
class TreeController extends ContainerAware
{
    public function createAction(Request $request)
    {
        $form = $this->getFormFactory()->create($this->getNodeManager()->create());

        $handler = $this->getFormHandler();

        if (true === $handler->process($request, $form)) {
            $this->getNodeManager()->save();

            $handler->onSuccess($form->getData());

            return new RedirectResponse($this->container->get('router')->generate('tadcka_list_of_tree'));
        }

        return $this->getTemplating()->renderResponse(
            'TadckaTreeBundle:Tree/Create:create.html.twig',
            array('form' => $form->createView())
        );
    }

    public function listAction($page = 1)
    {
        $pagination = new Pagination($this->getTreeManager()->count(), $page, 20);

        $trees = $this->getTreeProvider()->getListOfTrees($pagination->getOffset(), $pagination->getItemsInPage());

        return $this->getTemplating()->renderResponse(
            'TadckaTreeBundle:Tree/List:list.html.twig',
            array(
                'trees' => $trees,
                'pagination' => $this->container->get('tadcka_paginator.manager')->getPaginatorHtml($pagination),
            )
        );
    }

    /**
     * @return EngineInterface
     */
    private function getTemplating()
    {
        return $this->container->get('templating');
    }

    /**
     * @return NodeManagerInterface
     */
    private function getNodeManager()
    {
        return $this->container->get('tadcka_tree.manager.node');
    }

    /**
     * @return TreeManagerInterface
     */
    private function getTreeManager()
    {
        return $this->container->get('tadcka_tree.manager.tree');
    }

    /**
     * @return NodeFormFactory
     */
    private function getFormFactory()
    {
        return $this->container->get('tadcka_tree.form_factory.node');
    }

    /**
     * @return NodeFormHandler
     */
    private function getFormHandler()
    {
        return $this->container->get('tadcka_tree.form_handler.node');
    }

    /**
     * @return TreeProvider
     */
    private function getTreeProvider()
    {
        return $this->container->get('tadcka_tree.provider.tree');
    }
}
