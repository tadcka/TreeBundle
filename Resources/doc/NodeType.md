## Registry new tree node type

### Tree node type loader

``` php
<?php

namespace Tadcka\Bundle\AcmeBundle\Tree;

use Symfony\Component\Translation\TranslatorInterface;
use Tadcka\Bundle\TreeBundle\NodeType\Registry\NodeTypeConfig;
use Tadcka\Bundle\TreeBundle\NodeType\Registry\NodeTypeLoaderInterface;
use Tadcka\Bundle\TreeBundle\NodeType\Registry\NodeTypeRegistryInterface;


class NodeTypeLoader implements NodeTypeLoaderInterface
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function register(NodeTypeRegistryInterface $registry)
    {
        $product = new NodeTypeConfig(
            $this->translator->trans('product_category', array(), 'TadckaAcmeBundle'),
            'product',
            '/bundles/tadckaacme/images/icon/product.png',
            array('header_menu', 'left_menu')
        );

        $registry->add($product);
    }
}
```