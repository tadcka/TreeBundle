<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Frontend\Helper;

use Symfony\Component\Translation\TranslatorInterface;
use Tadcka\Bundle\TreeBundle\Frontend\Model\Node;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/23/14 12:44 AM
 */
class FrontendHelper
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Constructor
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Get root.
     *
     * @param NodeInterface $node
     * @param string $locale
     *
     * @return Node
     */
    public function getRoot(NodeInterface $node, $locale)
    {
        return new Node($node->getId(), $this->getNodeTitle($node, $locale), $this->hasNodeChildren($node));
    }

    /**
     * Get node children.
     *
     * @param NodeInterface $node
     * @param string $locale
     *
     * @return array|Node[]
     */
    public function getNodeChildren(NodeInterface $node, $locale)
    {
        $children = array();
        foreach ($node->getChildren() as $child) {
            $children[] = new Node(
                $child->getId(),
                $this->getNodeTitle($child, $locale),
                $this->hasNodeChildren($child)
            );
        }

        return $children;
    }

    /**
     * Get node title.
     *
     * @param NodeInterface $node
     * @param string $locale
     *
     * @return string
     */
    private function getNodeTitle(NodeInterface $node, $locale)
    {
        $title = $this->translator->trans('not_found_title', array(), 'TadckaTreeBundle');

        $translation = $node->getTranslation($locale);
        if (null !== $translation && trim($translation->getTitle())) {
            $title = $translation->getTitle();
        }

        return $title;
    }

    /**
     * Has node children.
     *
     * @param NodeInterface $node
     *
     * @return bool
     */
    private function hasNodeChildren(NodeInterface $node)
    {
        return count($node->getChildren()) ? true : false;
    }
}
