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

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tadcka\Bundle\TreeBundle\Form\Type\NodeFormType;
use Tadcka\Bundle\TreeBundle\Helper\FrontendHelper;
use Tadcka\Bundle\TreeBundle\Helper\JsonResponseHelper;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 11:11 PM
 */
class NodeController extends ContainerAware
{
    public function createAction(Request $request, $id)
    {
        $node = $this->getManager()->findNode($id);
        if (null !== $node) {
            $form = $this->container->get('form.factory')->create(
                new NodeFormType(),
                null,
                array(
                    'data_class' => $this->container->getParameter('tadcka_tree.model.node.class'),
                    'translation_class' => $this->container->getParameter('tadcka_tree.model.node_translation.class'),
                    'action' => $this->container->get('router')->getContext()->getPathInfo(),
                )
            );

            return $this->container->get('templating')->renderResponse(
                'TadckaTreeBundle:Node:create.html.twig',
                array(
                    'form' => $form->createView(),
                )
            );
        }

        return new Response();
    }


    public function getRootAction(Request $request, $rootId)
    {
        $root = $this->getManager()->findRoot($rootId);
        if (null !== $root) {
            $response = $this->getJsonResponseHelper()->getResponse(
                array($this->getFrontendHelper()->getRoot($root, $request->getLocale()))
            );

            return $response;
        }

        return new Response();
    }

    public function getNodeAction(Request $request, $id)
    {
        $node = $this->getManager()->findNode($id);
        if (null !== $node) {
            $response = $this->getJsonResponseHelper()->getResponse(
                $this->getFrontendHelper()->getNodeChildren($node, $request->getLocale())
            );

            return $response;
        }

        return new Response();
    }

    /**
     * @return NodeManagerInterface
     */
    private function getManager()
    {
        return $this->container->get('tadcka_tree.manager.node');
    }

    /**
     * @return JsonResponseHelper
     */
    private function getJsonResponseHelper()
    {
        return $this->container->get('tadcka_tree.helper.json_response');
    }

    /**
     * @return FrontendHelper
     */
    private function getFrontendHelper()
    {
        return $this->container->get('tadcka_tree.frontend.helper.frontend');
    }
}
