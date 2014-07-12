## Doctrine ORM

### Tree class

``` php
<?php
// src/Tadcka/Bundle/AcmeBundle/Entity/Tree.php

namespace Tadcka\Bundle\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tadcka\Bundle\TreeBundle\Model\Tree as BaseTree;

/**
 * Class Tree
 *
 * @package Tadcka\Bundle\AcmeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="tadcka_tree")
 */
class Tree extends BaseTree
{
}
```

### TreeNode class

``` php
<?php
// src/Tadcka/Bundle/AcmeBundle/Entity/TreeNode.php

namespace Tadcka\Bundle\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Tadcka\Bundle\TreeBundle\Model\Node as BaseNode;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\Model\NodeTranslationInterface;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class TreeNode
 *
 * @package Tadcka\Bundle\AcmeBundle\Entity
 *
 * @Gedmo\Tree(type="nested")
 *
 * @ORM\Entity
 * @ORM\Table(name="tadcka_tree_node")
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 */
class TreeNode extends BaseNode
{
    /**
     * @var NodeInterface
     *
     * @Gedmo\TreeParent
     *
     * @ORM\ManyToOne(targetEntity="Tadcka\Bundle\AcmeBundle\Entity\TreeNode", inversedBy="children")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * })
     */
    protected $parent;

    /**
     * @var array|NodeInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Tadcka\Bundle\AcmeBundle\Entity\TreeNode",
     *      mappedBy="parent",
     *      cascade={"persist", "remove"}
     * )
     * @ORM\OrderBy({"priority" = "DESC"})
     */
    protected $children;

    /**
     * @var array|NodeTranslationInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Tadcka\Bundle\AcmeBundle\Entity\TreeNodeTranslation",
     *      mappedBy="node",
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

        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function addChild(NodeInterface $child)
    {
        $this->children[] = $child;
    }

    /**
     * {@inheritdoc}
     */
    public function removeChild(NodeInterface $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(NodeTranslationInterface $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(NodeTranslationInterface $translation)
    {
        $this->translations->removeElement($translation);
    }
}
```

### TreeNodeTranslation class

``` php
<?php
// src/Tadcka/Bundle/AcmeBundle/Entity/TreeNodeTranslation.php

namespace Tadcka\Bundle\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tadcka\Bundle\TreeBundle\Model\NodeInterface;
use Tadcka\Bundle\TreeBundle\Model\NodeTranslation as BaseNodeTranslation;

/**
 * Class TreeNodeTranslation
 *
 * @package Tadcka\Bundle\AcmeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(
 *      name="tadcka_tree_node_translation",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="unique_lang_idx", columns={"node_id", "lang"})
 *      }
 * )
 */
class TreeNodeTranslation extends BaseNodeTranslation
{
    /**
     * @var NodeInterface
     *
     * @ORM\ManyToOne(targetEntity="Tadcka\Bundle\AcmeBundle\Entity\TreeNode", inversedBy="translations")
     * @ORM\JoinColumn(name="node_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $node;
}
```