Entities
==========

## Tree

``` php
<?php

namespace Tadcka\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tadcka\Bundle\TreeBundle\Model\Tree as BaseTree;

/**
 * Class Tree
 *
 * @package Tadcka\AcmeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="tadcka_tree")
 */
class Tree extends BaseTree
{
    /**
     * @var array|TreeTranslationInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Tadcka\AcmeBundle\Entity\TreeTranslation",
     *      mappedBy="tree",
     *      cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->translations = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(TreeTranslationInterface $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(TreeTranslationInterface $translation)
    {
        $this->translations->removeElement($translation);
    }
}
```

## TreeTranslation

``` php
<?php

namespace Tadcka\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tadcka\Bundle\TreeBundle\Model\TreeInterface;
use Tadcka\Bundle\TreeBundle\Model\TreeTranslation as BaseTreeItemTranslation;

/**
 * Class TreeTranslation
 *
 * @package Tadcka\AcmeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(
 *      name="tadcka_tree_translation",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="unique_lang_idx", columns={"tree_id", "lang"})
 *      }
 * )
 */
class TreeTranslation extends BaseTreeItemTranslation
{
    /**
     * @var TreeInterface
     *
     * @ORM\ManyToOne(targetEntity="Tadcka\AcmeBundle\Entity\Tree", inversedBy="translations")
     * @ORM\JoinColumn(name="tree_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $tree;
}
```

## TreeItem

``` php
<?php

namespace Tadcka\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Tadcka\Bundle\TreeBundle\Model\TreeInterface;
use Tadcka\Bundle\TreeBundle\Model\TreeItem as BaseTreeItem;
use Tadcka\Bundle\TreeBundle\Model\TreeItemInterface;
use Tadcka\Bundle\TreeBundle\Model\TreeItemTranslationInterface;

/**
 * Class TreeItem
 *
 * @package Tadcka\AcmeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="tadcka_tree_item")
 */
class TreeItem extends BaseTreeItem
{
    /**
     * @var TreeItemInterface
     *
     * @ORM\ManyToOne(targetEntity="Tadcka\AcmeBundle\Entity\TreeItem", inversedBy="children")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="tree_item_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    protected $parent;

    /**
     * @var array|TreeItemInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Tadcka\AcmeBundle\Entity\TreeItem",
     *      mappedBy="parent",
     *      cascade={"persist", "remove"}
     * )
     */
    protected $children;

    /**
     * @var array|TreeItemTranslationInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Tadcka\AcmeBundle\Entity\TreeItemTranslation",
     *      mappedBy="treeItem",
     *      cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @var TreeInterface
     *
     * @ORM\ManyToOne(targetEntity="Tadcka\AcmeBundle\Entity\Tree")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="tree_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    protected $tree;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addChild(TreeItemInterface $child)
    {
        $this->children[] = $child;
    }

    /**
     * {@inheritdoc}
     */
    public function removeChild(TreeItemInterface $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(TreeItemTranslationInterface $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(TreeItemTranslationInterface $translation)
    {
        $this->translations->removeElement($translation);
    }
}
```

## StatusTranslation

``` php
<?php

namespace Tadcka\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tadcka\Bundle\TreeBundle\Model\TreeItemInterface;
use Tadcka\Bundle\TreeBundle\Model\TreeItemTranslation as BaseTreeItemTranslation;

/**
 * Class TreeItemTranslation
 *
 * @package Tadcka\AcmeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(
 *      name="tadcka_tree_item_translation",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="unique_lang_idx", columns={"tree_item_id", "lang"})
 *      }
 * )
 */
class TreeItemTranslation extends BaseTreeItemTranslation
{
    /**
     * @var TreeItemInterface
     *
     * @ORM\ManyToOne(targetEntity="Tadcka\AcmeBundle\Entity\TreeItem", inversedBy="translations")
     * @ORM\JoinColumn(name="tree_item_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $treeItem;
}
```