## Registry new tree

### Tree loader

``` php
<?php

namespace Tadcka\Bundle\AcmeBundle\Tree;

use Tadcka\Bundle\TreeBundle\Registry\TreeConfig;
use Tadcka\Bundle\TreeBundle\Registry\TreeLoaderInterface;
use Tadcka\Bundle\TreeBundle\Registry\TreeRegistryInterface;

class TreeLoader implements TreeLoaderInterface
{
    /**
     * Load tree config and register it.
     *
     * @param TreeRegistryInterface $registry
     */
    public function register(TreeRegistryInterface $registry)
    {
        $config = new TreeConfig(
            'tadcka_acme_tree',
            new ContextMenuFactory(),
            '/bundles/tadckaacme/images/icon/acme.png'
        );

        $registry->add($config);
    }
}
```

### Context menu factory

``` php
<?php

namespace Tadcka\Bundle\AcmeBundle\Tree;

use Tadcka\Bundle\TreeBundle\ContextMenu\ContextMenuFactoryInterface;
use Tadcka\JsTreeBundle\Model\ContextMenu;

class ContextMenuFactory implements ContextMenuFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        return new ContextMenu();
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
        <parameter key="tadcka_acme.loader.tree.class">Tadcka\Bundle\AcmeBundle\Tree\TreeLoader</parameter>
    </parameters>

    <services>

        <service id="tadcka_acme.loader.tree" class="%tadcka_acme.loader.tree.class%">
            <tag name="tadcka_tree" />
        </service>

    </services>
</container>
```