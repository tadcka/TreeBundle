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

### Dependency injection configuration

``` xml
<?xml version="1.0" ?>

<container xmlns="http://symfony.com/schema/dic/services"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://symfony.com/schema/dic/services http://symfony.com/schema/dic/services/services-1.0.xsd">

    <parameters>
        <parameter key="tadcka_acme.loader.node_type.class">Tadcka\Bundle\AcmeBundle\Tree\NodeTypeLoader</parameter>
    </parameters>

    <services>

        <service id="tadcka_acme.loader.node_type" class="%tadcka_acme.loader.node_type.class%">
            <tag name="tadcka_tree_node_type" />
            <argument type="service" id="translator" />
        </service>

    </services>
</container>
```
