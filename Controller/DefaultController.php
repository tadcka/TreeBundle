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

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 4/12/14 9:51 PM
 */
class DefaultController extends ContainerAware
{
    /**
     * @return EngineInterface
     */
    private function getTemplating()
    {
        return $this->container->get('templating');
    }

    public function indexAction()
    {
        return $this->getTemplating()->renderResponse('TadckaTreeBundle:Tree:index.html.twig');
    }
}
