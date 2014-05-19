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

use JMS\Serializer\SerializerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Tadcka\Bundle\TreeBundle\Frontend\Model\Root;
use Tadcka\Bundle\TreeBundle\ModelManager\NodeManagerInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/2/14 11:11 PM
 */
class NodeController extends ContainerAware
{
    /**
     * @return NodeManagerInterface
     */
    private function getManager()
    {
        return $this->container->get('tadcka_tree.manager.node');
    }

    /**
     * @return SerializerInterface
     */
    private function getSerializer()
    {
        return $this->container->get('serializer');
    }

    public function getRootAction($id)
    {
        $root = new Root('bandymas', true);

        $response = new Response($this->getSerializer()->serialize(array($root), 'json'));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function getNode(Request $request, $id)
    {

    }
}
