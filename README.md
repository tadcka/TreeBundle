TreeBundle
==========

Tree manager bundle, not stable.

## Installation

### Step 1: Download TadckaTreeBundle using composer

Add TadckaTreeBundle in your composer.json:

```js
{
    "require": {
        "tadcka/tree-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update tadcka/tree-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tadcka\TreeBundle\TadckaTreeBundle(),
    );
}
```

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

Code License:
[Resources/meta/LICENSE](https://github.com/tadcka/TreeBundle/blob/master/Resources/meta/LICENSE)
