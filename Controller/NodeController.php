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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\TranslatorInterface;
use Tadcka\Bundle\TreeBundle\Event\NodeEvent;
use Tadcka\Bundle\TreeBundle\Form\Factory\NodeFormFactory;
use Tadcka\Bundle\TreeBundle\Form\Handler\NodeFormHandler;
use Tadcka\Bundle\TreeBundle\Helper\FrontendHelper;
use Tadcka\Bundle\TreeBundle\Helper\JsonResponseHelper;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManagerInterface;
use Tadcka\Bundle\TreeBundle\Registry\TreeRegistry;
use Tadcka\Bundle\TreeBundle\TadckaTreeEvents;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since  4/2/14 11:11 PM
 */
class NodeController extends ContainerAware
{
    public function createAction(Request $request, $id)
    {
        $parent = $this->getManager()->findNode($id);
        if (null === $parent) {
            throw new NotFoundHttpException();
        }

        $node = $this->getManager()->create();
        $node->setParent($parent);
        $form = $this->getFormFactory()->create($node);

        $messages = array();
        if ($this->getFormHandler()->process($request, $form)) {
            $this->getManager()->save();
            $messages['success'] = $this->getTranslator()->trans('success.create_node', array(), 'TadckaTreeBundle');

            $this->getEventDispacher()->dispatch(TadckaTreeEvents::NODE_CREATE_SUCCESS, new NodeEvent($node));
        }

        return $this->container->get('templating')->renderResponse(
            'TadckaTreeBundle:Node:form.html.twig',
            array(
                'form' => $form->createView(),
                'messages' => $messages,
            )
        );
    }

    public function editAction(Request $request, $id)
    {
        $node = $this->getManager()->findNode($id);

        if (null === $node) {
            throw new NotFoundHttpException();
        }

        $form = $this->getFormFactory()->create($node);

        $messages = array();
        if ($this->getFormHandler()->process($request, $form)) {
            $this->getManager()->save();
            $messages['success'] = $this->getTranslator()->trans('success.edit_node', array(), 'TadckaTreeBundle');

            $this->getEventDispacher()->dispatch(TadckaTreeEvents::NODE_EDIT_SUCCESS, new NodeEvent($node));
        }

        return $this->container->get('templating')->renderResponse(
            'TadckaTreeBundle:Node:form.html.twig',
            array(
                'form' => $form->createView(),
                'messages' => $messages,
            )
        );
    }

    public function deleteAction(Request $request, $id)
    {
        $node = $this->getManager()->findNode($id);
        if ((null !== $node)) {
            if (null !== $node->getParent()) {
                if ($request->isMethod('DELETE')) {
                    $this->getManager()->delete($node);

                    $this->getEventDispacher()->dispatch(TadckaTreeEvents::NODE_DELETE_SUCCESS, new NodeEvent($node));

                    return new Response();
                }

                return $this->container->get('templating')->renderResponse(
                    'TadckaTreeBundle:Node:delete.html.twig',
                    array(
                        'node_id' => $id
                    )
                );
            } else {
                return new Response("Don't delete the tree root!");
            }
        }

        return new Response('Not found tree node!');
    }


    public function getRootAction(Request $request, $rootId)
    {
        $root = $this->getManager()->findRoot($rootId);
        if (null !== $root) {
            $tree = $this->getTreeManager()->findTreeByRootId($rootId);
            $iconPath = null;
            $config = $this->getTreeRegistry()->getConfigs()->get($tree->getSlug());
            if ((null !== $tree) && (null !== $config)) {
                $iconPath = $config->getIconPath();
            }
            $response = $this->getJsonResponseHelper()->getResponse(
                array($this->getFrontendHelper()->getRoot($root, $request->getLocale(), $iconPath))
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
     * @return TranslatorInterface
     */
    private function getTranslator()
    {
        return $this->container->get('translator');
    }

    /**
     * @return NodeManagerInterface
     */
    private function getManager()
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
     * Get tree registry.
     *
     * @return TreeRegistry
     */
    private function getTreeRegistry()
    {
        return $this->container->get('tadcka_tree.registry.tree');
    }

    /**
     * @return EventDispatcherInterface
     */
    private function getEventDispacher()
    {
        return $this->container->get('event_dispatcher');
    }
}
