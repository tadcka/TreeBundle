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
use Symfony\Component\HttpFoundation\Request;
use Tadcka\Bundle\TreeBundle\ModelManager\TreeManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 3/24/14 10:15 PM
 */
class TreeController extends ContainerAware
{
    /**
     * @return EngineInterface
     */
    private function getTemplating()
    {
        return $this->container->get('templating');
    }

    /**
     * @return TreeManagerInterface
     */
    private function getManager()
    {
        return $this->container->get('tadcka_tree.manager.tree');
    }

    public function indexAction()
    {

        return $this->getTemplating()->renderResponse('TadckaTreeBundle:Tree:index.html.twig');
    }

    public function createAction(Request $request)
    {

    }

    public function editAction(Request $request)
    {

    }

    public function deleteAction(Request $request)
    {

    }
}
 